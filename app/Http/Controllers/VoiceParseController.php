<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VoiceParseController extends Controller
{
    public function parse(Request $request)
    {
        $request->validate([
            'transcript' => 'required|string|max:5000',
        ]);

        $apiKey = env('OPENROUTER_API_KEY');

        if (!$apiKey) {
            return response()->json([
                'success' => false,
                'message' => 'AI service not configured. Please add OPENROUTER_API_KEY to .env',
            ], 500);
        }

        $transcript = $request->input('transcript');

        $prompt = <<<PROMPT
You are a smart form-filling assistant for a video production company called Thumbpin Studios.

A potential client just spoke into a microphone describing what they need. Your job is to take their raw speech and produce well-structured, professional form data. Do NOT just extract — ENHANCE and POLISH their words to create high-quality lead data.

Rules:
- "name": The person's name (clean and capitalize properly)
- "company_name": Their company or brand name if mentioned, otherwise ""
- "email": Their email if mentioned, otherwise ""
- "phone": Their phone number if mentioned (digits only), otherwise ""
- "video_type": Must be EXACTLY one of: "Corporate Film", "Product Shoot", "Brand Film", "Short Content / Reels", "Podcast", "Event Coverage", "Other". Pick the closest match based on what they described.
- "budget_range": Must be EXACTLY one of: "₹50K – ₹1L", "₹1L – ₹3L", "₹3L – ₹5L", "₹5L+". Map their budget mention to the closest range. If not mentioned, use "".
- "message": This is the MOST IMPORTANT field. Take everything the user said about their project and rewrite it as a clear, professional project brief. Expand on their ideas, add structure, and make it sound compelling. This should read like a well-written project requirement, not raw speech.

Respond with ONLY valid JSON, no markdown, no explanation.

User's speech transcript:
"$transcript"
PROMPT;

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$apiKey}",
                'HTTP-Referer' => config('app.url'),
                'X-Title' => 'Thumbpin Studios',
            ])->timeout(20)->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'arcee-ai/trinity-large-preview:free',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt]
                ],
                'temperature' => 0.3
            ]);

            if (!$response->successful()) {
                Log::error('OpenRouter API error: ' . $response->body());
                return response()->json([
                    'success' => false,
                    'message' => 'AI service temporarily unavailable.',
                ], 500);
            }

            $body = $response->json();
            $text = $body['choices'][0]['message']['content'] ?? '';

            // Clean markdown code fences if present
            $text = trim($text);
            $text = preg_replace('/^```json\s*/i', '', $text);
            $text = preg_replace('/```\s*$/', '', $text);
            $text = trim($text);

            $parsed = json_decode($text, true);

            if (!$parsed) {
                Log::error('Gemini returned invalid JSON: ' . $text);
                return response()->json([
                    'success' => false,
                    'message' => 'Could not parse your speech. Please try again.',
                ], 422);
            }

            // Validate video_type against allowed values
            $allowedVideoTypes = ['Corporate Film', 'Product Shoot', 'Brand Film', 'Short Content / Reels', 'Podcast', 'Event Coverage', 'Other'];
            if (isset($parsed['video_type']) && !in_array($parsed['video_type'], $allowedVideoTypes)) {
                $parsed['video_type'] = 'Other';
            }

            // Validate budget_range against allowed values
            $allowedBudgets = ['₹50K – ₹1L', '₹1L – ₹3L', '₹3L – ₹5L', '₹5L+'];
            if (isset($parsed['budget_range']) && !in_array($parsed['budget_range'], $allowedBudgets)) {
                $parsed['budget_range'] = '';
            }

            return response()->json([
                'success' => true,
                'data' => $parsed,
            ]);

        } catch (\Exception $e) {
            Log::error('Voice parse error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
            ], 500);
        }
    }
}
