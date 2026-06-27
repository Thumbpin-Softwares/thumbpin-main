@extends('layout.visitor', [
    'title' => 'Leading Branding & Advertising Agency in Gurgaon | Thumbpin',
    'description' => 'Thumbpin is a 360 creative and digital advertising agency in Gurgaon that will help your business flourish with its effective strategy and ideas.',
    'footer_black' => 'footer-black',
    'hideWhatsApp' => true,
])

@section('head')
    <!-- Google Fonts: Manrope -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- MediaPipe Hands & Camera Utils - Lazy loaded when gesture feature is activated --}}

    <link rel="stylesheet" href="{{ config('app.url') }}/assets/css/new-home-page.css">

    <style>
        /* ================= GLOBAL RESET & VARIABLES ================= */
        :root {
            --tp-red: #ce2d33; /* Vibrant Agency Red */
            --tp-black: #0F0F0F;
            --tp-dark: #1A1A1A;
            --tp-gray: #F4F4F4;
            --tp-white: #ffffff;
            --font-head: 'AcuminVariableConcept', sans-serif;
            --font-body: 'AcuminVariableConcept', sans-serif;
        }

        body {
            background-color: var(--tp-black);
            font-family: var(--font-body);
            color: var(--tp-black);
            overflow-x: hidden;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        html { scroll-behavior: smooth; }

        h1, h2, h3, h4, .sec-title b {
            font-family: var(--font-head);
            color: var(--tp-black);
        }

        a { text-decoration: none; color: inherit; transition: 0.3s; }
        .txt-red { color: var(--tp-red); }

        /* ================= 1. FIXED HERO (UPDATED) ================= */
        .hero-fixed {
            position: fixed; top: 0; left: 0; width: 100%; height: 100vh;
            z-index: -1; overflow: hidden; background: #000;
        }
        
        /* Hero Video Background */
        #hero-video-bg {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            object-fit: cover;
        }

        /* Dark Overlay for Video */
        .hero-video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1;
        }

        /* Desktop video - shown by default */
        #hero-video-bg {
            display: block;
        }
        
        /* Mobile video - hidden by default, loaded via JS on small screens */
        #hero-video-mobile {
            display: none;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            object-fit: cover;
        }
        
        /* Mobile video container - same positioning as video */
        #hero-video-mobile-container {
            display: none;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        
        #hero-video-mobile-container #hero-video-mobile {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Hero Text Content Overlay */
        .hero-text-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 1400px;
            text-align: center;
            z-index: 5;
            pointer-events: none;
        }

        /* Centered Hero Text Layout with Inline Video */
        .hero-centered-text {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0;
        }

        .hero-text-line {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(32px, 8vw, 100px);
            font-weight: 900;
            text-transform: uppercase;
            line-height: 1;
            color: #fff;
            letter-spacing: -3px;
            opacity: 0;
            transform: translateY(30px);
            animation: heroTextReveal 1.2s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
            gap: clamp(10px, 2vw, 25px);
        }

        .hero-text-line:nth-child(1) { animation-delay: 0.4s; }
        .hero-text-line:nth-child(2) { animation-delay: 0.6s; }
        .hero-text-line:nth-child(3) { animation-delay: 0.8s; }
        .hero-text-line:nth-child(4) { animation-delay: 1.0s; }

        .hero-text-line span {
            display: inline-block;
        }

        /* Inline Video Pill */
        .hero-video-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: clamp(80px, 16vw, 220px);
            height: clamp(40px, 7vw, 100px);
            border-radius: 9999px;
            overflow: hidden;
            margin: 0 clamp(5px, 1vw, 15px);
            flex-shrink: 0;
            pointer-events: auto;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 255, 255, 0.2);
            transform: translateY(-5%);
        }

        .hero-video-pill video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-text-content h1 {
            font-size: clamp(32px, 8vw, 90px);
            font-weight: 900;
            text-transform: uppercase;
            line-height: 1;
            color: #fff;
            letter-spacing: -2px;
            margin: 0;
            opacity: 0;
            transform: translateY(30px);
            animation: heroTextReveal 1.2s cubic-bezier(0.165, 0.84, 0.44, 1) forwards 0.8s;
        }

        @keyframes heroTextReveal {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Small Laptops (MacBook 13", etc.) */
        @media (max-width: 1280px) {
            .hero-text-line {
                font-size: clamp(28px, 6vw, 72px);
                letter-spacing: -2px;
                gap: clamp(8px, 1.5vw, 18px);
            }
            
            .hero-video-pill {
                width: clamp(70px, 14vw, 160px);
                height: clamp(35px, 6vw, 75px);
            }
        }

        /* Medium Screens / Large Tablets */
        @media (max-width: 1024px) {
            .hero-text-line {
                font-size: clamp(24px, 5.5vw, 56px);
                letter-spacing: -1.5px;
                gap: clamp(6px, 1.2vw, 14px);
            }
            
            .hero-video-pill {
                width: clamp(60px, 12vw, 130px);
                height: clamp(30px, 5vw, 60px);
            }
        }

        /* Tablet & Mobile - Smaller hero, no overlay, no text */
        @media (max-width: 768px) {
            .hero-fixed {
                height: 60vh;
            }
            
            /* Hide desktop video, show mobile video container */
            #hero-video-bg {
                display: none;
            }
            
            #hero-video-mobile-container {
                display: block;
            }
            
            .hero-video-overlay {
                display: none;
            }
            
            .hero-text-content {
                display: none;
            }
            
            .scroll-hint {
                display: none;
            }
            
            .main-content-wrapper {
                margin-top: 60vh;
            }
        }

        /* Gradient Overlay to blend with content */
        .hero-overlay-gradient {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 40%;
            background: linear-gradient(to top, rgba(255,255,255,1), transparent);
            z-index: 1;
            pointer-events: none;
            opacity: 0; /* Hidden initially, visible near scroll point if needed */
        }
        
        .scroll-hint {
            position: absolute; bottom: 40px; left: 50%; transform: translateX(-50%);
            color: #fff; text-transform: uppercase; font-size: 12px; letter-spacing: 3px;
            animation: bounce 2s infinite; z-index: 2; mix-blend-mode: difference;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateX(-50%) translateY(0);}
            40% {transform: translateX(-50%) translateY(-10px);}
            60% {transform: translateX(-50%) translateY(-5px);}
        }

        /* ================= 2. CONTENT WRAPPER ================= */
        .main-content-wrapper {
            position: relative; z-index: 10; margin-top: 100vh;
            background-color: var(--tp-white); box-shadow: 0 -20px 80px rgba(0,0,0,0.8);
             overflow: hidden;
        }

        /* ================= SECTIONS COMMON ================= */
        .sec-padding { padding: 120px 0; }
        .section-header-modern { margin-bottom: 80px; position: relative; }
        .section-header-modern h2 {
            font-size: clamp(40px, 6vw, 80px); text-transform: uppercase;
            line-height: 0.9; font-weight: 800; letter-spacing: -2px;
        }
        .section-header-modern .sub-text {
            font-size: 18px; color: #666; margin-top: 20px; max-width: 400px;
            border-left: 2px solid var(--tp-red); padding-left: 20px;
        }

        /* ================= INTRO ================= */
        .sec-intro { background: var(--tp-white); padding-top: 150px; }
        .intro-grid { display: grid; grid-template-columns: 1.5fr 1fr; gap: 60px; align-items: center; }
        .big-statement {
            font-family: var(--font-head); font-size: clamp(48px, 7vw, 90px);
            line-height: 0.95; font-weight: 800; text-transform: uppercase; letter-spacing: -3px;
        }
        .big-statement span { color: var(--tp-red); }
        .intro-desc { font-size: 22px; color: #444; font-weight: 400; line-height: 1.6; }

        /* ================= EXPERTISE ================= */
        .sec-expertise { background: #f9f9f9; }
        .expert-card {
            background: #fff; padding: 50px 40px; height: 100%; border: 1px solid #eee;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); position: relative; overflow: hidden;
        }
        .expert-card:hover {
            background: var(--tp-black); color: #fff; transform: translateY(-10px); border-color: var(--tp-black);
        }
        .expert-card:hover .expert-icon { color: #fff; }
        .expert-card:hover .expert-title { color: #fff; }
        .expert-card:hover .expert-list li { color: #aaa; }
        .expert-card:hover .expert-list li::before { background: var(--tp-red); }

        .expert-icon { font-size: 40px; margin-bottom: 30px; color: var(--tp-red); transition: 0.3s; }
        .expert-title { font-size: 32px; font-weight: 800; margin-bottom: 20px; letter-spacing: -1px; transition: 0.3s; }
        .expert-list { list-style: none; padding: 0; margin: 0; }
        .expert-list li { margin-bottom: 10px; font-size: 16px; color: #666; position: relative; padding-left: 20px; transition: 0.3s; }
        .expert-list li::before { content: ''; position: absolute; left: 0; top: 10px; width: 6px; height: 6px; background: #ddd; border-radius: 50%; transition: 0.3s; }

        /* ================= WORKS: Revamped Grid ================= */
        .sec-works { background: var(--tp-black); color: #fff;}
        .work-item-link { display: block; text-decoration: none; color: inherit; height: 100%; }
        
        .featured-work-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            border-top: 1px solid #333;
            border-bottom: 1px solid #333;
        }

        .work-item { 
            display: flex; 
            flex-direction: column; 
            border-right: 1px solid #333; 
            height: 100%;
            transition: background 0.3s ease;
        }
        
        /* Remove border/padding for specific grid items handled by structure or nth-child logic if dynamic */
        /* For static 3 items, simplistic approach: */
        .work-item-link:nth-child(3) .work-item { border-right: none; }

        .work-img { 
            height: 350px; 
            width: 100%; 
            overflow: hidden; 
            position: relative; 
            order: -1; /* Image Top */
        }
        .work-img img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            transition: transform 0.8s cubic-bezier(0.2, 1, 0.3, 1); 
            filter: grayscale(100%); 
        }
        
        .work-content { 
            padding: 40px 30px; 
            display: flex; 
            flex-direction: column; 
            justify-content: flex-start;
            flex-grow: 1;
        }

        .work-cat { color: var(--tp-red); font-weight: 700; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 15px; font-size: 13px; }
        .work-title { font-size: 32px; font-family: var(--font-head); line-height: 1.1; margin-bottom: 15px; color: #fff; font-weight: 700; }
        .work-desc { font-size: 16px; color: #999; margin-bottom: 25px; line-height: 1.5; }
        .work-link { 
            margin-top: auto; 
            display: inline-flex; 
            align-items: center; 
            color: #fff; 
            text-transform: uppercase; 
            font-weight: 700; 
            letter-spacing: 1px; 
            border-bottom: 1px solid #333; 
            padding-bottom: 5px; 
            align-self: flex-start;
            transition: border-color 0.3s;
        }

        /* Hover Effects */
        .work-item-link:hover .work-item { background: #111; }
        .work-item-link:hover .work-img img { transform: scale(1.1); filter: grayscale(0%); }
        .work-item-link:hover .work-link { border-bottom-color: var(--tp-red); color: var(--tp-red); }

        /* Responsive Works */
        @media (max-width: 991px) {
            .featured-work-grid { grid-template-columns: repeat(2, 1fr); }
            .work-item-link:nth-child(2) .work-item { border-right: none; } /* Reset for 2 col */
            .work-item-link:nth-child(3) .work-item { border-right: 1px solid #333; border-top: 1px solid #333; }
        }
        @media (max-width: 768px) {
            .featured-work-grid { grid-template-columns: 1fr; }
            .work-item { border-right: none; border-bottom: 1px solid #333; }
            .work-item-link:last-child .work-item { border-bottom: none; }
            .work-img { height: 280px; }
        }

        /* ================= PROCESS ================= */
        .sec-process { background: #fff; border-bottom: 1px solid #eee; }
        .process-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; counter-reset: p-counter; }
        .process-step { position: relative; padding-top: 40px; border-top: 2px solid #000; }
        .process-step::before {
            counter-increment: p-counter; content: "0" counter(p-counter); position: absolute; top: -40px; left: 0;
            font-size: 80px; font-family: var(--font-head); font-weight: 800; color: #f0f0f0; z-index: -1; line-height: 1;
        }
        .process-title { font-size: 24px; font-weight: 800; margin-bottom: 15px; text-transform: uppercase; }
        .process-desc { font-size: 16px; color: #666; line-height: 1.6; }

        /* ================= INSIGHTCOOL ================= */
        .sec-resources { padding: 100px 0; background: #fff; }
        .bento-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; height: 500px; }
        .bento-item {
            background: #f4f4f4; padding: 40px; display: flex; flex-direction: column; justify-content: flex-end;
            transition: 0.3s; position: relative; overflow: hidden;
        }
        .nonchange:hover{ background: var(--tp-black); }
        .bento-item:hover { background: var(--tp-black); color: #fff; }
        .bento-item:hover h3 { color: #fff; }
        .bento-item:nth-child(1) { grid-column: span 2; background: #eee; }
        .bento-title { font-size: 32px; font-weight: 800; margin-bottom: 10px; color: #000; font-family: var(--font-head); }
        .bento-link { font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--tp-red); }

        /* ================= REDESIGNED CONTACT SECTION (LIGHT) ================= */
        .sec-contact {
            background: #f7f7f7;
            position: relative;
            padding: 120px 0;
            overflow: hidden;
        }
        .sec-contact::before {
            content: '';
            position: absolute;
            top: -150px; right: -100px;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(206,45,51,0.06) 0%, transparent 65%);
            pointer-events: none;
        }
        .sec-contact::after {
            content: '';
            position: absolute;
            bottom: -150px; left: -100px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(206,45,51,0.04) 0%, transparent 65%);
            pointer-events: none;
        }
        .contact-overlay-bg {
            position: absolute; inset: 0;
            background: transparent;
        }
        .contact-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 60px;
            align-items: start;
            position: relative;
            z-index: 2;
            padding: 0 20px;
        }
        .contact-left-col {
            padding-top: 10px;
        }
        .contact-kicker {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--tp-red);
            margin-bottom: 20px;
            display: inline-block;
            background: rgba(206,45,51,0.06);
            padding: 6px 14px;
            border-radius: 4px;
        }
        .contact-headline {
            font-family: var(--font-head);
            font-size: clamp(38px, 5vw, 58px);
            font-weight: 800;
            text-transform: uppercase;
            line-height: 1.05;
            color: #111;
            margin-bottom: 24px;
            letter-spacing: -2px;
        }
        .contact-headline span { color: var(--tp-red); }
        .contact-body-text {
            color: #666;
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 36px;
            max-width: 400px;
        }
        .contact-perks {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-bottom: 36px;
            padding: 0;
        }
        .contact-perks li {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            color: #555;
            font-weight: 500;
        }
        .contact-perks li::before {
            content: '';
            width: 8px; height: 8px;
            border-radius: 50%;
            background: var(--tp-red);
            flex-shrink: 0;
            box-shadow: 0 0 6px rgba(206,45,51,0.3);
        }
        .contact-direct {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding-top: 10px;
            border-top: 1px solid #e0e0e0;
        }
        .contact-direct a {
            font-size: 14px;
            color: #888;
            text-decoration: none;
            transition: 0.25s;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }
        .contact-direct a:hover { color: var(--tp-red); }
        .contact-direct a svg { color: var(--tp-red); }

        /* Form Card — Light Glassmorphism */
        .contact-card-new {
            background: #fff;
            border: 1px solid #eaeaea;
            border-radius: 20px;
            padding: 44px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.06), 0 1px 3px rgba(0,0,0,0.04);
            position: relative;
        }
        .contact-card-new::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--tp-red), #ff6b6b, var(--tp-red));
            border-radius: 20px 20px 0 0;
        }
        .c-field {
            position: relative;
            margin-bottom: 20px;
        }
        .c-input {
            width: 100%;
            background: #f9f9f9;
            border: 1.5px solid #e8e8e8;
            border-radius: 10px;
            color: #222;
            font-size: 15px;
            font-family: var(--font-body);
            padding: 16px 18px;
            transition: border-color 0.25s, background 0.25s, box-shadow 0.25s;
            appearance: none;
            -webkit-appearance: none;
            box-sizing: border-box;
        }
        .c-input::placeholder { color: #aaa; font-size: 13px; letter-spacing: 0.3px; }
        .c-input:focus {
            outline: none;
            border-color: var(--tp-red);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(206,45,51,0.08);
        }
        .c-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }
        .c-submit {
            width: 100%;
            padding: 16px;
            background: var(--tp-red);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 6px;
            box-shadow: 0 4px 15px rgba(206,45,51,0.2);
        }
        .c-submit:hover {
            background: #b22228;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(206,45,51,0.3);
        }
        .c-actions {
            display: flex;
            gap: 10px;
            margin-top: 14px;
        }
        .c-btn-reset {
            flex: 1;
            display: flex; align-items: center; justify-content: center; gap: 6px;
            padding: 12px;
            background: #f4f4f4;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            color: #888;
            font-size: 12px; font-weight: 700;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.25s;
        }
        .c-btn-reset:hover { background: #e8e8e8; color: #555; }
        .c-btn-wa {
            flex: 1;
            display: flex; align-items: center; justify-content: center; gap: 6px;
            padding: 12px;
            background: rgba(37,211,102,0.06);
            border: 1px solid rgba(37,211,102,0.2);
            border-radius: 10px;
            color: #1da851;
            font-size: 12px; font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;
            transition: 0.25s;
        }
        .c-btn-wa:hover { background: rgba(37,211,102,0.12); color: #178a42; }

        /* Voice AI Button in Form */
        .voice-ai-trigger {
            background: rgba(206,45,51,0.06);
            border: 1px solid rgba(206,45,51,0.2);
            border-radius: 10px;
            padding: 10px 20px;
            color: var(--tp-red);
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: var(--font-body);
        }
        .voice-ai-trigger:hover {
            background: rgba(206,45,51,0.1);
            border-color: rgba(206,45,51,0.4);
        }
        .voice-ai-trigger.listening {
            background: var(--tp-red);
            color: #fff;
            border-color: var(--tp-red);
            animation: pulse-voice 1.5s infinite;
        }
        @keyframes pulse-voice {
            0% { box-shadow: 0 0 0 0 rgba(206,45,51,0.4); }
            70% { box-shadow: 0 0 0 10px rgba(206,45,51,0); }
            100% { box-shadow: 0 0 0 0 rgba(206,45,51,0); }
        }

        /* Form Messages */
        .form-messages {
            display: none;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 14px;
            font-weight: 600;
        }
        .form-messages.success {
            background: rgba(37,211,102,0.08);
            border: 1px solid rgba(37,211,102,0.2);
            color: #1da851;
        }
        .form-messages.error {
            background: rgba(206,45,51,0.06);
            border: 1px solid rgba(206,45,51,0.2);
            color: var(--tp-red);
        }

        /* Responsive Contact */
        @media (max-width: 860px) {
            .sec-contact { padding: 80px 0; }
            .contact-inner {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .contact-headline { font-size: 36px; }
            .contact-card-new { padding: 28px 20px; }
            .c-row { grid-template-columns: 1fr; gap: 0; }
            .contact-body-text { max-width: 100%; }
        }
        @media (max-width: 480px) {
            .sec-contact { padding: 60px 0; }
            .contact-headline { font-size: 30px; letter-spacing: -1px; }
            .contact-card-new { padding: 24px 16px; border-radius: 14px; }
            .c-input { padding: 14px 15px; font-size: 14px; }
            .c-submit { padding: 14px; font-size: 14px; }
            .c-actions { flex-direction: column; }
        }

        /* ================= AI CONTROL CENTER ================= */
        .ai-controls-container {
            position: fixed; bottom: 20px; left: 20px; z-index: 9999;
            display: flex; gap: 10px;
        }

        .ai-btn {
            background: var(--tp-black); color: #fff; border: 1px solid rgba(255,255,255,0.2);
            padding: 10px 20px; border-radius: 50px; font-weight: 600; font-size: 13px;
            cursor: pointer; box-shadow: 0 5px 15px rgba(0,0,0,0.3); transition: 0.3s;
            display: flex; align-items: center; gap: 8px;
        }
        .ai-btn:hover { background: var(--tp-red); }
        
        /* Voice Button Specifics */
        .ai-btn.listening {
            background: var(--tp-red);
            animation: pulse-red 1.5s infinite;
        }
        
        @keyframes pulse-red {
            0% { box-shadow: 0 0 0 0 rgba(230, 57, 70, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(230, 57, 70, 0); }
            100% { box-shadow: 0 0 0 0 rgba(230, 57, 70, 0); }
        }

        /* Voice Transcript Overlay */
        #voice-transcript-overlay {
            position: fixed; bottom: 80px; left: 20px; width: 300px;
            background: rgba(0,0,0,0.8); backdrop-filter: blur(10px);
            padding: 15px; border-radius: 12px; border-left: 3px solid var(--tp-red);
            color: #fff; font-size: 14px; z-index: 9999;
            display: none; box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .vt-label { font-size: 10px; text-transform: uppercase; color: #888; margin-bottom: 5px; display: block; }
        .vt-text { font-style: italic; color: #fff; }

        /* Gesture Bar */
        #gesture-control-bar {
            position: fixed; bottom: 0; left: 0; width: 100%; height: 40px;
            background: rgba(0, 0, 0, 0.95); backdrop-filter: blur(10px);
            border-top: 1px solid #333; z-index: 10000; display: none;
            align-items: center; padding: 0 20px; justify-content: space-between;
            color: #fff; font-family: var(--font-body);
        }
        .gc-left { display: flex; align-items: center; gap: 15px; }
        .gc-cam-preview {
            width: 28px; height: 28px; border-radius: 50%; overflow: hidden;
            border: 1px solid #555; background: #000; position: relative;
        }
        .gc-cam-preview video { width: 100%; height: 100%; object-fit: cover; transform: scaleX(-1); }
        .gc-cam-preview.active { border-color: var(--tp-red); }
        .gc-cam-preview.thumbsup { border-color: #2ecc71; }
        .gc-status { font-size: 11px; font-weight: 700; text-transform: uppercase; width: 80px; white-space: nowrap; color: var(--tp-red); }
        .gc-instructions {
            display: flex; gap: 15px; font-size: 10px; color: #888;
            border-left: 1px solid #333; padding-left: 15px; height: 20px; align-items: center;
        }
        .gc-item { display: flex; align-items: center; gap: 4px; }
        .gc-icon { font-size: 12px; }
        .gc-close-btn {
            background: transparent; border: none; color: #666; width: 30px; height: 30px;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: 0.3s; font-size: 12px;
        }
        .gc-close-btn:hover { color: #fff; }

        /* Thumbs Up Success Overlay */
        #thumbs-success {
            position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%) scale(0.5);
            background: rgba(230, 57, 70, 0.95); color: #fff; padding: 30px 50px;
            border-radius: 20px; text-align: center; z-index: 10001; opacity: 0;
            pointer-events: none; transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        #thumbs-success.active { opacity: 1; transform: translate(-50%, -50%) scale(1); }
        #thumbs-success i { font-size: 40px; margin-bottom: 15px; display: block; }
        #thumbs-success h4 { font-size: 20px; margin: 0; font-weight: 700; }

        /* Confetti Canvas */
        #confetti-canvas {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            pointer-events: none; z-index: 99999;
        }

        /* ================= ADVERTISING AGENCY STYLES ================= */
        
        /* What We Do Section */
        .what-we-do-section {
            padding: 120px 20px; background: #fff; position: relative;
        }
        .section-container {
            max-width: 1300px; margin: 0 auto; display: flex;
            align-items: center; justify-content: space-between; gap: 80px;
        }
        .video-container {
            flex: 1.5; background-color: #f0f0f0; border-radius: 20px;
            overflow: hidden; position: relative; aspect-ratio: 16/9;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15); cursor: pointer;
            transition: transform 0.5s ease;
        }
        .video-container:hover { transform: translateY(-10px); }
        .video-content { width: 100%; height: 100%; object-fit: cover; }
        
        .click-play-overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.3); display: flex; align-items: center;
            justify-content: center; transition: background 0.3s; z-index: 2;
        }
        .video-container:hover .click-play-overlay { background: rgba(0, 0, 0, 0.1); }
        
        .big-play-btn {
            width: 80px; height: 80px; background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px); border-radius: 50%; display: flex;
            align-items: center; justify-content: center; transition: transform 0.3s;
            border: 2px solid rgba(255, 255, 255, 0.5);
        }
        .big-play-btn svg { width: 30px; height: 30px; fill: #fff; margin-left: 4px; }
        
        .what-we-do-text { flex: 1; }
        .what-we-do-text h2 {
            font-size: 72px; font-weight: 900; line-height: 0.9;
            color: #000; text-transform: uppercase; margin-bottom: 30px;
        }
        .what-we-do-desc {
            font-size: 18px; color: #555; line-height: 1.7; margin-bottom: 40px;
        }
        .btn-chat {
            display: inline-block; padding: 15px 40px; background: var(--tp-red);
            color: #fff; border-radius: 50px; font-weight: 700;
            text-transform: uppercase; transition: 0.3s;
        }
        .btn-chat:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(230, 57, 70, 0.3); }
        
        /* Mobile Responsive What We Do */
        @media (max-width: 768px) {
            .what-we-do-section { padding: 80px 15px; }
            .section-container {
                flex-direction: column; gap: 40px; text-align: center;
            }
            .video-container {
                width: 100%; max-width: 500px;
            }
            .what-we-do-text h2 {
                font-size: 48px; line-height: 1.1;
            }
            .what-we-do-desc {
                font-size: 16px; max-width: 100%;
            }
            .btn-chat {
                padding: 12px 30px; font-size: 14px;
            }
        }
        
        @media (max-width: 480px) {
            .what-we-do-section { padding: 60px 15px; }
            .section-container { gap: 30px; }
            .what-we-do-text h2 {
                font-size: 36px; margin-bottom: 20px;
            }
            .what-we-do-desc {
                font-size: 15px; margin-bottom: 30px;
            }
            .video-container {
                border-radius: 15px;
            }
        }
        
        /* Services Section */
        .services-section { background: #f9f9f9; padding: 140px 20px; }
        .services-header { text-align: center; margin-bottom: 80px; }
        .services-header h2 {
            font-size: 56px; font-weight: 900; color: #000; text-transform: uppercase;
        }
        .services-header h2 span { color: var(--tp-red); }
        .text-red { color: var(--tp-red); }
        
        .services-container { max-width: 1400px; margin: 60px auto;}
        .bento-grid-v2 {
            display: grid; grid-template-columns: repeat(12, 1fr);
            gap: 30px; margin-bottom: 30px; padding:0 10px;
        }
        
        .grid-item {
            background: #111; border-radius: 30px; padding: 50px;
            position: relative; overflow: hidden; display: flex;
            flex-direction: column; justify-content: flex-end;
            transition: var(--transition-smooth); min-height: 300px;
            border: 1px solid #222;
        }
        .grid-item:hover {
            transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }
        .grid-item.span-6 { grid-column: span 12; }
        @media(min-width: 900px) {
            .grid-item.span-6 { grid-column: span 6; }
        }
        .grid-item.span-12 {
            grid-column: span 12; display: flex; flex-direction: row;
            align-items: center; justify-content: space-between; min-height: 350px;
        }
        
        /* Mobile Responsive Services Grid */
        @media (max-width: 768px) {
            .services-section { padding: 60px 15px; }
            .services-header { margin-bottom: 50px; }
            .services-header h2 { font-size: 36px; }
            .services-header p { font-size: 16px; }
            .bento-grid-v2 { gap: 20px; }
            .grid-item {
                padding: 30px 25px; min-height: 250px;
                border-radius: 20px;
            }
            .grid-item.span-12 {
                /* Keep default or minimal changes here if needed, but rely on new class */
            }

            /* New Mobile Fix Class */
            .mobile-tailored-fix {
                flex-direction: column-reverse !important;
                text-align: center !important;
                padding: 40px 20px !important;
                gap: 20px !important;
                justify-content: center !important;
                align-items: center !important;
            }
            .mobile-tailored-fix .tailored-content {
                width: 100% !important;
                align-items: center !important;
                text-align: center !important;
            }
            .mobile-tailored-fix .tailored-img {
                width: 60% !important;
                max-width: 200px !important;
                margin-bottom: 20px !important;
            }
            .mobile-tailored-fix .b-title {
                text-align: center !important;
                margin: 0 auto 15px auto !important;
            }
            .mobile-tailored-fix .b-desc {
                text-align: center !important;
                margin: 0 auto 25px auto !important;
            }
            
            /* Fix for other grid items if needed */
            .grid-item {
                align-items: flex-start; /* Default alignment */
            }
            .grid-item.mobile-center {
                align-items: center !important;
                text-align: center !important;
            }
        }
        
        @media (max-width: 480px) {
            .services-header h2 { font-size: 28px; line-height: 1.2; }
            .grid-item { padding: 25px 20px; min-height: 220px; }
            .b-title { font-size: 24px; max-width: 100%; }
            .b-icon { width: 60px; height: 60px; top: 15px; right: 15px; }
            .b-number { font-size: 120px; top: -30px; left: -10px; }
        }
        
        .bg-card-1 { background-image: url('https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/cardbg.webp'); background-size: cover; }
        .bg-card-2 { background-image: url('https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/cardbg2.webp'); background-size: cover; }
        .bg-card-3 { background-image: url('https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/cardbg3.webp'); background-size: cover; }
        .bg-card-4 { background-image: url('https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/cardbg4.webp'); background-size: cover; }
        .bg-card-full { background: linear-gradient(135deg, #1a1a1a 0%, #000 100%); }
        
        .b-content { position: relative; z-index: 2; width: 100%; }
        .b-number {
            font-size: 180px; font-weight: 900; color: rgba(255, 255, 255, 0.03);
            position: absolute; top: -50px; left: -20px; line-height: 1; pointer-events: none;
        }
        .b-icon {
            width: 80px; height: 80px; background: rgba(255, 255, 255, 0.05);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            position: absolute; top: 30px; right: 30px; backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .b-icon img { width: 80%; }
        .b-title {
            font-size: 32px; font-weight: 700; color: #fff; margin-bottom: 15px;
            line-height: 1.1; max-width: calc(100% - 120px);
        }
        .b-title span { color: var(--tp-red); }
        .b-desc {
            font-size: 16px; color: #aaa; max-width: 90%; margin-bottom: 25px; line-height: 1.5;
        }
        .btn-book {
            display: inline-block; padding: 12px 30px; background: rgba(255, 255, 255, 0.1);
            color: #fff; border-radius: 50px; font-weight: 700; transition: 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .btn-book:hover { 
            background: var(--tp-red) !important; 
            border-color: var(--tp-red) !important; 
            color: #fff !important;
        }
        
        .grid-marquee-item {
            grid-column: span 12; width: 100vw; position: relative;
            left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw;
            background: var(--tp-red); height: 50px; overflow: hidden;
            display: flex; align-items: center; border-radius: 0; margin-bottom: -15px;
        }
        .expertise-marquee-wrapper { display: flex; width: 100%; overflow: hidden; }
        .expertise-marquee-content {
            display: flex; white-space: nowrap; animation: expertiseMarquee 25s linear infinite;
        }
        .expertise-marquee-content span {
            color: #fff; font-weight: 800; font-size: 20px; text-transform: uppercase;
            margin-right: 50px; letter-spacing: 2px; display: flex; align-items: center; height: 50px;
        }
        @keyframes expertiseMarquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        .tailored-content { width: 60%; }
        .tailored-img {
            width: 35%; height: auto; object-fit: contain; filter: brightness(1.2);
        }
        
        /* Clients Marquee Section */
        .clients-section { 
            background: #fff; 
            padding: 50px 0 20px; /* Reduced bottom padding */
            overflow: hidden; 
            margin-top:80px;
            margin-bottom:-40px;
            position: relative;
        }
        
        .client-header-classic {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .client-header-classic h2 {
            font-size: 24px; /* Smaller font size */
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 4px; /* Classic wide tracking */
            color: #333;
            margin: 0;
            display: inline-block;
            position: relative;
            padding-bottom: 10px;
        }
        
        .client-header-classic h2::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 2px;
            background: var(--tp-red);
        }

        .client-header-classic span {
            font-weight: 700;
            color: #000;
        }
        
        .marquee-container {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            position: relative;
        }
        
        .marquee-track {
            display: flex;
            gap: 32px; /* Generous gap */
            width: max-content;
        }

        .track-fast {
            animation: marqueeScroll 30s linear infinite;
        }

        .track-slow {
            animation: marqueeScroll 60s linear infinite;
        }
        
        .marquee-track:hover {
            animation-play-state: paused;
        }
        
        .client-logo {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .client-logo img {
            height: 100px; /* Even bigger logos */
            width: auto;
            max-width: 150px; /* Prevent oversized logos */
            object-fit: contain;
            filter: grayscale(100%) opacity(0.6);
            transition: all 0.4s ease;
        }
        
        /* Fix for oversized logos (21, 22) */
        .client-logo img[src*="21.png"],
        .client-logo img[src*="22.png"] {
            height: 60px;
            max-width: 120px;
        }
        
        .client-logo:hover img {
            filter: grayscale(0%) opacity(1);
            transform: scale(1.1);
        }
        
        @keyframes marqueeScroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        /* Gradient Fade Edges */
        .clients-section::before, .clients-section::after {
            content: ""; position: absolute; top: 0; width: 150px; height: 100%; z-index: 2;
            pointer-events: none;
        }
        .clients-section::before { left: 0; background: linear-gradient(to right, #fff, transparent); }
        .clients-section::after { right: 0; background: linear-gradient(to left, #fff, transparent); }
        
        /* Mobile Responsive Clients */       
        /* Mobile Responsive Clients */
        @media (max-width: 768px) {
            .clients-section { padding: 60px 15px; }
            .clients-grid {
                grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
                gap: 25px;
            }
            .client-logo img { max-width: 180px; }
        }
        
        @media (max-width: 480px) {
            .clients-section { padding: 50px 15px; }
            .clients-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }
            .client-logo img { max-width: 80px; }
        }
        
        /* Testimonials Section */
        .testimonials-section { background: #f9f9f9; padding: 100px 20px; }
        .testimonials-wrapper { position: relative; max-width: 1000px; margin: 60px auto; }
        .testimonial-track {
            position: relative; width: 100%; height: 450px;
            display: flex; align-items: center; justify-content: center;
        }
        .testi-card-v2 {
            position: absolute; left: 50%; transform: translateX(-50%);
            width: 600px; background: #fff; padding: 60px 50px;
            border-radius: 20px; box-shadow: 0 10px 50px rgba(0, 0, 0, 0.1);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #eee; opacity: 0; pointer-events: none;
        }
        
        .testi-card-v2.active {
            opacity: 1; transform: translateX(-50%) scale(1); z-index: 3; pointer-events: auto;
        }
        
        .testi-card-v2.prev {
            opacity: 0.3; transform: translateX(-120%) scale(0.85); z-index: 1;
        }
        
        .testi-card-v2.next {
            opacity: 0.3; transform: translateX(20%) scale(0.85); z-index: 1;
        }
        
        .testi-card-v2.hidden {
            opacity: 0; transform: translateX(-50%) scale(0.5);
            pointer-events: none;
        }
        
        @media(max-width: 768px) {
            .testimonial-track { height: 450px; }
            .testi-card-v2 { width: 280px; padding: 30px 20px; }
            .testi-card-v2.active { transform: scale(1); }
            .testi-card-v2.prev, .testi-card-v2.next { opacity: 0; }
        }
        .testi-v2-logo {
            width: 80px; height: 80px; object-fit: contain; margin-bottom: 20px;
        }
        .testi-v2-role {
            color: var(--tp-red); font-weight: 700; font-size: 14px; text-transform: uppercase;
        }
        .testi-v2-name { color: #000; font-weight: 700; font-size: 16px; }
        .testi-v2-quote-area { position: relative; margin-top: 10px; }
        .testi-v2-quote-area::before {
            content: '"'; position: absolute; top: -30px; left: -10px;
            font-size: 120px; color: #f2f2f2; font-family: serif; line-height: 1; z-index: -1;
        }
        .testi-v2-text { color: #444; font-size: 15px; line-height: 1.6; }
        .testi-controls {
            display: flex; justify-content: center; gap: 20px; margin-top: 20px; z-index: 20; position: relative;
        }

        /* ================= QUICK LINKS SECTION ================= */
        .sec-quick-links {
            background: #fff;
            padding: 100px 0;
            border-bottom: 1px solid #eee;
        }
        .quick-links-header {
            margin-bottom: 60px;
            padding-left: 20px;
            border-left: 3px solid var(--tp-red);
        }
        .quick-links-header h2 {
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
            font-weight: 800;
        }

        .quick-links-list {
            list-style: none;
            padding: 0;
            margin: 0;
            border-top: 1px solid #111;
        }
        .quick-link-item {
            border-bottom: 1px solid #111;
            transition: background 0.3s;
        }
        .quick-link-item a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 20px;
            text-decoration: none;
            color: #000;
            position: relative;
            overflow: hidden;
        }
        .ql-title {
            font-size: clamp(32px, 5vw, 80px);
            font-weight: 900;
            text-transform: uppercase;
            margin: 0;
            line-height: 1;
            transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .ql-arrow {
            font-size: 40px;
            opacity: 0;
            transform: translateX(-20px);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            color: var(--tp-red);
        }
        
        .quick-link-item:hover {
            background: #000;
        }
        .quick-link-item:hover .ql-title {
            color: #fff;
            transform: translateX(20px);
        }
        .quick-link-item:hover .ql-arrow {
            opacity: 1;
            transform: translateX(0);
        }

        @media (max-width: 768px) {
            .quick-links-list { border-top: 1px solid #ccc; }
            .quick-link-item { border-bottom: 1px solid #ccc; }
            .ql-title { font-size: 32px; }
            .ql-arrow { font-size: 24px; }
            .quick-links-header { margin-bottom: 40px; }
        }
        .testi-btn {
            width: 50px; height: 50px; border-radius: 50%; background: #fff;
            border: 1px solid #eee; color: #000; font-size: 20px; cursor: pointer;
            display: flex; align-items: center; justify-content: center; transition: 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        .testi-btn:hover { background: var(--tp-red); color: #fff; border-color: var(--tp-red); }
        
        /* Mobile Responsive Testimonials */
        @media(max-width: 768px) {
            .testimonials-section { padding: 80px 15px; }
            .testimonials-wrapper { margin: 40px auto; }
            .testimonial-track { height: 400px; }
            .testi-card-v2 {
                width: 90%; max-width: 350px; padding: 40px 30px;
                border-radius: 15px;
            }
            .testi-card-v2.active { transform: translateX(-50%) scale(1); }
            .testi-card-v2.prev, .testi-card-v2.next { opacity: 0; }
            .testi-v2-logo { width: 60px; height: 60px; margin-bottom: 15px; }
            .testi-v2-role { font-size: 12px; }
            .testi-v2-name { font-size: 14px; }
            .testi-v2-text { font-size: 14px; line-height: 1.5; }
            .testi-v2-quote-area::before { font-size: 80px; top: -20px; left: -5px; }
            .testi-btn { width: 40px; height: 40px; font-size: 16px; }
        }
        
        @media(max-width: 480px) {
            .testimonials-section { padding: 60px 15px; }
            .testimonial-track { height: 350px; }
            .testi-card-v2 {
                width: 95%; padding: 30px 20px;
            }
            .testi-v2-text { font-size: 13px; }
            .testi-controls { gap: 15px; margin-top: 15px; }
            .testi-btn { width: 35px; height: 35px; font-size: 14px; }
        }
        
        /* Portfolio Section - Complete Drag System */
        .portfolio-section { background: #000; padding: 100px 0; color: #fff; }
        .portfolio-showcase {
            width: 100%; height: 80vh; overflow-x: auto; overflow-y: hidden;
            position: relative; margin: 60px 0;
            scrollbar-width: none; -ms-overflow-style: none;
        }
        
        .portfolio-showcase::-webkit-scrollbar { display: none; }
        
        .portfolio-scroller {
            position: relative; width: max-content; height: 100%;
            display: flex;
        }
        
        .portfolio-img {
            height: 100%; width: auto; display: block; object-fit: cover;
            flex-shrink: 0; min-width: 100vw;
        }
        
        .portfolio-img:nth-child(2) { display: none; }
        
        /* Scroll hint arrow for mobile */
        .portfolio-scroll-hint {
            position: absolute; right: 15px; top: 50%; transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.4); color: #fff; padding: 8px;
            border-radius: 50%; display: none; align-items: center; justify-content: center;
            z-index: 10; pointer-events: none; transition: opacity 0.3s ease;
        }
        
        .portfolio-scroll-hint svg {
            width: 18px; height: 18px; animation: slideHintBounce 1.5s ease-in-out infinite;
        }
        
        @keyframes slideHintBounce {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(5px); }
        }
        
        @media(max-width: 768px) {
            .portfolio-showcase {
                cursor: grab;
            }
            
            .portfolio-showcase:active {
                cursor: grabbing;
            }
            
            .portfolio-scroll-hint {
                display: flex;
            }
            
            .portfolio-scroll-hint.hidden {
                opacity: 0; pointer-events: none;
            }
        }
        
        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .portfolio-showcase { height: 60vh; }
        }
        
        @media (max-width: 768px) {
            .portfolio-showcase { height: 40vh; }
            .portfolio-img { min-width: 320vw; }
        }
        
        @media (max-width: 480px) {
            .portfolio-showcase { height: 35vh; }
            .portfolio-img { min-width: 320vw; }
        }
        
        /* Case Studies */
        .case-wrapper { max-width: 1300px; margin: 0 auto; padding: 0 20px; }
        .case-card {
            background: #111; border-radius: 30px; overflow: hidden;
            margin-bottom: 60px; display: flex; flex-direction: column; border: 1px solid #222;
        }
        @media(min-width: 800px) {
            .case-card { flex-direction: row; height: 500px; }
        }
        .case-video {
            flex: 1.5; position: relative; overflow: hidden; cursor: pointer;
        }
        .case-video video, .case-video img {
            width: 100%; height: 100%; object-fit: cover; transition: 0.5s; display: block;
        }
        .case-card:hover .case-video video { transform: scale(1.05); }
        .case-info {
            flex: 1; padding: 60px; display: flex; flex-direction: column; justify-content: center;
        }
        .case-tag {
            background: var(--tp-red); color: #fff; padding: 5px 15px;
            border-radius: 4px; font-size: 12px; font-weight: 700;
            align-self: flex-start; margin-bottom: 20px; text-transform: uppercase;
        }
        .case-desc {
            font-size: 24px; color: #ddd; line-height: 1.5; font-weight: 300;
        }
        
        /* Mockup Grid */
        .mockup-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 40px; max-width: 1200px; margin: 100px auto; padding: 0 20px;
        }
        .mockup-screen {
            background: #000; border-radius: 12px; overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6); border: 1px solid #222;
            position: relative; cursor: pointer; display: flex;
            align-items: center; justify-content: center; max-height: 500px;
        }
        .mockup-screen video {
            width: 100%; height: auto; max-height: 500px; object-fit: contain; display: block;
        }
        
        /* Mobile Responsive Portfolio */
        @media (max-width: 768px) {
            .case-wrapper { padding: 0 15px; }
            .case-card {
                margin-bottom: 40px; border-radius: 20px;
                flex-direction: column !important; height: auto !important;
            }
            .case-video {
                height: 250px; order: 1;
            }
            .case-info {
                padding: 40px 30px; order: 2;
            }
            .case-desc {
                font-size: 18px;
            }
            .mockup-grid {
                grid-template-columns: 1fr;
                gap: 30px; margin: 60px auto; padding: 0 15px;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
            .mockup-screen {
                border-radius: 10px; max-height: 300px;
            }
        }
        
        @media (max-width: 480px) {
            .case-card { margin-bottom: 30px; }
            .case-video { height: 200px; }
            .case-info { padding: 30px 20px; }
            .case-desc { font-size: 16px; }
            .case-tag { font-size: 11px; padding: 4px 12px; }
            .mockup-grid {
                gap: 20px; margin: 40px auto;
                grid-template-columns: 1fr;
            }
        }
        
        /* Square Gallery (Social Highlights) */
        .square-gallery {
            max-width: 1400px; margin: 100px auto; padding: 0 20px;
        }
        
        @media (min-width: 768px) {
            .square-gallery {
                display: flex; flex-direction: column; gap: 30px; overflow: hidden; padding: 0;
            }
            .marquee-row {
                display: flex; width: fit-content; gap: 30px;
                animation-duration: 40s; animation-timing-function: linear; animation-iteration-count: infinite;
            }
            .marquee-row-1 { animation-name: marqueeLeft; }
            .marquee-row-2 { animation-name: marqueeRight; }
            .square-item {
                flex-shrink: 0; width: auto; height: 300px;
                border-radius: 20px; overflow: hidden; background: transparent; position: relative;
            }
            .social-vertical-grid { display: none; }
        }
        
        /* Mobile Vertical Marquee Fix */
        @media (max-width: 767px) {
            .square-gallery { display: none; }
            .social-vertical-grid {
                display: flex; gap: 15px; height: 400px; overflow: hidden;
                max-width: 1400px; margin: 60px auto; padding: 0 20px;
            }
            .social-col {
                flex: 1; height: 100%; overflow: hidden; position: relative;
            }
            .social-col-inner {
                display: flex; flex-direction: column; gap: 15px;
                animation-duration: 20s; animation-timing-function: linear; animation-iteration-count: infinite;
            }
            .social-col-inner.animate-up { animation-name: marqueeUp; }
            .social-col-inner.animate-down { animation-name: marqueeDown; }
        }
        
        @keyframes marqueeUp {
            0% { transform: translateY(0); }
            100% { transform: translateY(-50%); }
        }
        
        @keyframes marqueeDown {
            0% { transform: translateY(-50%); }
            100% { transform: translateY(0); }
        }
        
        .square-item img {
            width: 100%; height: 100%; object-fit: cover; display: block;
            transition: transform 0.5s ease;
        }
        
        .square-item:hover img {
            transform: scale(1.05);
        }
        
        @keyframes marqueeLeft {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        @keyframes marqueeRight {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0); }
        }
        
        /* Reels Section - Complete Animation System */
        .shorts-modern-section {
            padding: 20px 10px; background: #000; overflow: hidden;
        }
        
        .shorts-header-modern {
            text-align: center; margin-bottom: 60px; position: relative; z-index: 2;
        }
        
        .shorts-header-modern h2 {
            font-size: 48px; font-weight: 900; color: #fff; letter-spacing: -1px;
        }
        
        .modern-reel-grid {
            display: grid; grid-template-columns: repeat(4, 1fr);
            gap: 25px; max-width: 1400px; margin: 0 auto; perspective: 1000px;
        }
        
        /* Focus Effect: Dim non-hovered items */
        .modern-reel-grid:hover .reel-card-wrap:not(:hover) {
            opacity: 0.4; filter: blur(3px) grayscale(60%); transform: scale(0.95);
        }
        
        .reel-card-wrap {
            position: relative; aspect-ratio: 9/16; border-radius: 20px;
            overflow: hidden; background: #111;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
            cursor: pointer; animation: floatCard 6s ease-in-out infinite;
        }
        
        /* Stagger animations for organic feel */
        .reel-card-wrap:nth-child(1) { animation-delay: 0s; }
        .reel-card-wrap:nth-child(2) { animation-delay: 1.5s; }
        .reel-card-wrap:nth-child(3) { animation-delay: 0.5s; }
        .reel-card-wrap:nth-child(4) { animation-delay: 2s; }
        
        .reel-card-wrap:hover {
            transform: scale(1.05) translateY(-10px) !important;
            z-index: 10; border-color: var(--tp-red);
            box-shadow: 0 20px 50px rgba(255, 0, 0, 0.25);
            animation-play-state: paused;
        }
        
        .modern-reel-video {
            width: 100%; height: 100%; object-fit: cover;
            transform: scale(1.01); transition: transform 0.7s;
        }
        
        .reel-card-wrap:hover .modern-reel-video {
            transform: scale(1.1);
        }
        
        .reel-overlay-gradient {
            position: absolute; bottom: 0; left: 0; width: 100%; height: 50%;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
            z-index: 2; pointer-events: none;
        }
        
        .reel-ui-top {
            position: absolute; top: 15px; right: 15px; z-index: 5;
        }
        
        .reel-mute-btn {
            width: 36px; height: 36px; border-radius: 50%;
            background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; transition: 0.3s; font-size: 16px; padding: 0;
        }
        
        .reel-mute-btn:hover {
            background: var(--tp-red); border-color: var(--tp-red);
            transform: rotate(360deg);
        }
        
        .reel-info-bottom {
            position: absolute; bottom: 20px; left: 20px;
            z-index: 5; width: calc(100% - 40px);
        }
        
        .reel-stats {
            display: flex; gap: 15px; font-size: 13px; color: #fff;
            font-weight: 600; opacity: 0; transform: translateY(10px); transition: 0.4s;
        }
        
        .reel-card-wrap:hover .reel-stats {
            opacity: 1; transform: translateY(0);
        }
        
        .stat-item {
            display: flex; align-items: center; gap: 5px;
        }
        
        .stat-item svg {
            width: 14px; height: 14px; fill: #fff;
        }
        
        @keyframes floatCard {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        /* Mobile Responsive - Horizontal Scroll */
        @media (max-width: 900px) {
            .modern-reel-grid {
                display: flex; gap: 20px; overflow-x: auto; overflow-y: hidden;
                scroll-snap-type: x mandatory; padding: 0 20px;
                scrollbar-width: none; -ms-overflow-style: none;
            }
            
            .reel-card-wrap {
                flex: 0 0 280px; scroll-snap-align: center;
                animation: none; transform: none;
            }
            
            .reel-card-wrap:hover {
                transform: scale(1.02) !important; animation-play-state: running;
            }
            
            .modern-reel-grid:hover .reel-card-wrap:not(:hover) {
                opacity: 1; filter: none; transform: none;
            }
            
            .reel-card-wrap:hover .modern-reel-video {
                transform: scale(1.02);
            }
            
            .reel-card-wrap:hover .reel-overlay-gradient {
                background: linear-gradient(to top, rgba(0,0,0,0.95), transparent);
            }
            
            .reel-stats { opacity: 1; transform: translateY(0); }
            
            .shorts-header-modern h2 { font-size: 36px; }
            
            .modern-reel-grid::-webkit-scrollbar { display: none; }
            .modern-reel-grid { scrollbar-width: none; -ms-overflow-style: none; }
        }
        
        /* Video Modal */
        .video-modal {
            display: none; position: fixed; z-index: 10000; left: 0; top: 0;
            width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(5px); align-items: center; justify-content: center;
        }
        .modal-content {
            position: relative; width: auto; height: auto; max-width: 95%; max-height: 95vh;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.5); background: #000;
            border-radius: 10px; overflow: hidden; display: flex;
            align-items: center; justify-content: center;
        }
        .modal-content video {
            display: block; max-width: 100%; max-height: 90vh;
            width: auto; height: auto; object-fit: contain;
        }
        .close-modal {
            position: absolute; top: -40px; right: 0; color: white;
            font-size: 35px; font-weight: bold; cursor: pointer; z-index: 10001; transition: 0.3s;
        }
        .close-modal:hover { color: var(--tp-red); transform: rotate(90deg); }
        
        /* Reveal Animation */
        .reveal {
            opacity: 0; transform: translateY(40px); transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .reveal.active { opacity: 1; transform: translateY(0); }

        @media (max-width: 991px) {
            .hero-fixed { position: relative; height: 80vh; z-index: 1; }
            .main-content-wrapper { margin-top: 0; }
            .ai-controls-container, #gesture-control-bar { display: none !important; }
            .work-item { grid-template-columns: 1fr; }
            .work-img { height: 300px; order: -1; }
            .bento-grid { display: block; height: auto; }
            .bento-item { margin-bottom: 20px; }
            .big-statement { font-size: 42px; }
            .intro-grid { grid-template-columns: 1fr; }
            .section-container { flex-direction: column; gap: 40px; }
            .what-we-do-text h2 { font-size: 48px; }
            .portfolio-showcase { height: 40vh; }
            .portfolio-scroll-hint { display: flex; }
            .testi-card-v2 { width: 90%; padding: 40px 30px; }
            .testi-card-v2.prev, .testi-card-v2.next { opacity: 0; }
            .modern-reel-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
            .reel-card-wrap { border-radius: 15px; }
        }
        
        @media (max-width: 768px) {
            .sec-padding { padding: 80px 0; }
            .section-header-modern { margin-bottom: 60px; }
            .section-header-modern h2 { font-size: 40px; }
            .services-header h2 { font-size: 36px; }
            .portfolio-section { padding: 80px 0; }
            .modern-reel-grid { grid-template-columns: repeat(2, 1fr); gap: 15px; }
            .reel-card-wrap { border-radius: 12px; }
            .reel-ui-top { top: 10px; right: 10px; }
            .reel-ui-top .reel-play-icon { width: 30px; height: 30px; }
            
            .contact-form input:focus, .contact-form textarea:focus { border-color: #000; }
        }

            /* ================= MINIMAL VIDEO SHOWCASE (New) ================= */
            .portfolio-section-minimal {
                background: #050505;
                padding: 120px 0;
                overflow: hidden;
            }

            .portfolio-mineral-header {
                text-align: left;
                margin-bottom: 100px;
                padding-bottom: 20px;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }
            
            .portfolio-mineral-header h2 {
                font-size: clamp(32px, 5vw, 64px);
                font-weight: 300;
                color: #fff;
                margin: 0;
                letter-spacing: -1px;
            }
            
            .portfolio-mineral-header h2 strong {
                font-weight: 800;
                color: #fff;
            }

            .case-minimal-wrapper {
                display: flex;
                flex-direction: column;
                gap: 150px;
            }

            .case-card-minimal {
                display: grid;
                grid-template-columns: 1.2fr 0.8fr;
                gap: 60px;
                align-items: center;
                opacity: 0; /* Animated entry */
                transform: translateY(30px);
                transition: 0.8s ease-out;
            }
            .case-card-minimal.active {
                opacity: 1;
                transform: translateY(0);
            }

            /* Alternate Layout */
            .case-card-minimal.alt-layout {
                grid-template-columns: 0.8fr 1.2fr;
            }
            .case-card-minimal.alt-layout .case-minimal-video {
                order: 2;
            }
            .case-card-minimal.alt-layout .case-minimal-info {
                order: 1;
                text-align: right;
                align-items: flex-end;
                padding: 60px; /* Keep consistent padding */
            }

            .case-minimal-video {
                background: #000;
                border-radius: 4px; /* Slight rounding but keep it sharp */
                overflow: hidden;
                position: relative;
                aspect-ratio: 16/9;
                box-shadow: 0 30px 60px rgba(0,0,0,0.5);
                border: 1px solid rgba(255,255,255,0.08);
                cursor: pointer;
                transition: transform 0.6s cubic-bezier(0.2, 1, 0.3, 1), border-color 0.3s;
            }
            
            .case-minimal-video:hover {
                transform: scale(1.02);
                border-color: rgba(255,255,255,0.2);
            }

            .case-minimal-video video {
                width: 100%;
                height: 100%;
                object-fit: contain; /* CRITICAL: Ensures video is not cut */
                display: block;
            }

            .case-play-btn {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) scale(0.9);
                width: 70px;
                height: 70px;
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                opacity: 0;
                transition: all 0.4s ease;
                border: 1px solid rgba(255,255,255,0.2);
            }
            
            .case-play-btn svg {
                width: 24px;
                height: 24px;
                fill: currentColor;
                margin-left: 4px;
            }

            .case-minimal-video:hover .case-play-btn {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }

            .case-minimal-info {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                padding: 60px;
                background: #0d0d0d;
                border-radius: 4px;
                border: 1px solid rgba(255,255,255,0.05);
                height: 100%; /* Match height of video if possible */
            }

            .case-min-tag {
                font-size: 11px;
                text-transform: uppercase;
                letter-spacing: 2px;
                color: var(--tp-red);
                font-weight: 700;
                margin-bottom: 25px;
                display: inline-block;
                position: relative;
            }
            
            .case-min-client-logo {
                width: 140px;
                height: auto;
                object-fit: contain; 
                filter: invert(1) brightness(2); /* Make white */
                margin-bottom: 30px;
                opacity: 0.9;
            }

            .case-min-title {
                font-size: 32px;
                font-weight: 400;
                color: #fff;
                margin-bottom: 20px;
                line-height: 1.3;
            }

            .case-min-desc {
                font-size: 16px;
                color: #888;
                font-weight: 300;
                line-height: 1.7;
                max-width: 400px;
            }
            
            /* Responsive Minimal */
            @media (max-width: 991px) {
                .case-minimal-wrapper { gap: 100px; }
                .case-card-minimal {
                    grid-template-columns: 1fr;
                    gap: 30px;
                }
                .case-card-minimal.alt-layout {
                    grid-template-columns: 1fr;
                }
                .case-card-minimal.alt-layout .case-minimal-video { order: 1; }
                .case-card-minimal.alt-layout .case-minimal-info { 
                    order: 2; 
                    text-align: left; 
                    padding: 40px 30px; 
                    align-items: flex-start;
                }
                .case-minimal-info { padding: 40px 30px; }
                .case-min-desc { max-width: 100%; }
                
                .case-play-btn {
                    opacity: 1; 
                    background: rgba(0,0,0,0.5);
                }
            }
        }
        
        @media (max-width: 480px) {
            .sec-padding { padding: 60px 0; }
            .section-header-modern h2 { font-size: 32px; }
            .section-header-modern .sub-text { font-size: 16px; padding-left: 15px; }
            .services-header h2 { font-size: 28px; }
            .portfolio-section { padding: 60px 0; }
            .services-header { margin-bottom: 40px; }
            .modern-reel-grid { grid-template-columns: 1fr; gap: 15px; }
            .reel-card-wrap { 
                border-radius: 10px; 
                max-width: 320px; 
                margin: 0 auto;
            }
            .reel-ui-top { top: 8px; right: 8px; }
            .reel-ui-top .reel-play-icon { width: 25px; height: 25px; }
            
            .contact-card { padding: 30px 15px; }
        }

        /* ================= YOUTUBE FACADE (Performance Optimization) ================= */
        .youtube-facade {
            position: relative;
            width: 100%;
            height: 100%;
            cursor: pointer;
            background: #000;
            overflow: hidden;
        }
        
        .youtube-facade img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease, filter 0.3s ease;
            background: #000; /* Fallback while loading */
        }
        
        .youtube-facade:hover img {
            transform: scale(1.05);
            filter: brightness(0.8);
        }
        
        .youtube-facade .yt-play-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 68px;
            height: 48px;
            background: rgba(255, 0, 0, 0.9);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 2;
        }
        
        .youtube-facade:hover .yt-play-btn {
            background: #ff0000;
            transform: translate(-50%, -50%) scale(1.1);
        }
        
        .youtube-facade .yt-play-btn svg {
            width: 24px;
            height: 24px;
            fill: #fff;
            margin-left: 3px;
        }

        /* ================= WORK FILTER SECTION ================= */
        .sec-work-filter { 
            height: 100vh; 
            overflow: hidden; 
            padding: 40px 0; 
            margin-bottom: 30px;
            background: #fff;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        /* Max Width 80vw Container */
        /* Max Width 80vw Container */
        .sec-work-filter .container-fluid {
            max-width: 85vw;
            margin: 0 auto;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .sec-work-filter .row { 
            height: 100%; /* Ensure it fills the flex space */
            min-height: 0; /* Allow shrinking for scroll */
            flex: 1;
            width: 100%;
            margin: 0; 
        }
        
        /* Section Header */
        .work-section-header {
            text-align: left;
            margin-bottom: 30px;
            padding-left: 15px;
        }
        .work-section-header h2 {
            font-size: 42px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -1px;
            color: #000;
            margin: 0;
            line-height: 1;
        }
        .work-section-header span {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: var(--tp-red);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        /* Premium Compact Sidebar */
        .work-sidebar { 
            padding-right: 30px; 
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Align to top */
            padding-top: 20px;
            border-right: 1px solid rgba(0,0,0,0.05);
            overflow-y: auto; /* Allow sidebar to scroll if needed */
        }
        
        .work-sidebar h3 { 
            font-size: 14px; 
            font-weight: 900; 
            margin-bottom: 20px; 
            text-transform: uppercase; 
            letter-spacing: 2px;
            color: var(--tp-red);
        }
        
        .filter-group { list-style: none; padding: 0; margin-bottom: 20px; }
        .filter-header { 
            font-size: 10px; 
            font-weight: 800; 
            color: #ccc; 
            text-transform: uppercase; 
            margin-bottom: 10px; 
            letter-spacing: 1px; 
            display: block;
        }
        
        /* Category Pills */
        .category-filters { display: flex; flex-wrap: wrap; gap: 8px; }
        .category-filters li { width: auto; margin-bottom: 0; }
        .category-filters li button {
            background: #f5f5f5; border: none; padding: 6px 12px; 
            font-size: 12px; color: #666; font-weight: 600;
            cursor: pointer; transition: all 0.3s ease; 
            border-radius: 20px;
        }
        .category-filters li button:hover, .category-filters li button.active { 
            background: #000; color: #fff; transform: translateY(-2px); box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }
        
        /* Project List - Scrollable & Compact */
        .project-filters-container {
            max-height: 40vh; /* Limit height */
            overflow-y: auto;
            padding-right: 5px;
            margin-top: 10px;
        }
        .project-filters-container::-webkit-scrollbar { width: 3px; }
        .project-filters-container::-webkit-scrollbar-thumb { background: #eee; border-radius: 3px; }
        
        .project-filters li button {
            background: none; border: none; padding: 4px 0; 
            font-size: 13px; color: #888; font-weight: 500;
            cursor: pointer; transition: all 0.2s ease; 
            text-align: left; display: block; width: 100%;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .project-filters li button:hover, .project-filters li button.active { 
            color: #000; padding-left: 5px; font-weight: 700;
        }
        
        /* Scrollable Grid Container */
        .work-grid-container {
            flex: 1; 
            height: 100%; 
            min-height: 0; /* Critical for flex scrolling */
            overflow-y: auto;
            padding-left: 40px;
            padding-right: 10px;
            display: flex;
            flex-direction: column;
            align-items: center; 
        }
        .work-grid-container::-webkit-scrollbar { width: 5px; }
        .work-grid-container::-webkit-scrollbar-track { background: transparent; }
        .work-grid-container::-webkit-scrollbar-thumb { background: #ddd; border-radius: 10px; }
        
        /* Grid Loader - Unique & Visible */
        .grid-loader {
            position: absolute; top: 50%; left: 60%; transform: translate(-50%, -50%);
            z-index: 20; display: flex; flex-direction: column; align-items: center;
            transition: opacity 0.5s, visibility 0.5s;
            background: rgba(255,255,255,0.9); padding: 30px; border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        }
        .grid-loader.hidden { opacity: 0; visibility: hidden; }
        
        .spinner-box {
            width: 60px; height: 60px; position: relative; margin-bottom: 15px;
        }
        .spinner-box .circle-border {
            width: 100%; height: 100%; border-radius: 50%;
            border: 4px solid transparent; border-top-color: var(--tp-red); border-right-color: var(--tp-red);
            animation: spin 1s linear infinite;
        }
        .spinner-box .circle-core {
            width: 50%; height: 50%; background: #000; border-radius: 50%;
            position: absolute; top: 25%; left: 25%;
            animation: pulse 1.5s ease-in-out infinite alternate;
        }
        
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        @keyframes pulse { 0% { transform: scale(0.8); opacity: 0.7; } 100% { transform: scale(1.1); opacity: 1; } }
        
        /* 3x3 Grid */
        .work-grid { 
            width: 100%;
            max-width: 1200px; 
            margin: 0 auto; 
            min-height: 50vh; /* Ensure height for loader */
        }
        
        /* Isotope Item Sizing & Skeleton Loader */
        .work-grid-item { 
            position: relative; 
            overflow: hidden; 
            width: 32%; 
            margin-bottom: 2%; 
            margin-right: 1.33%; 
            aspect-ratio: 1/1; 
            float: left; 
            background: #f0f0f0; 
            display: flex; align-items: center; justify-content: center;
        }
        
        /* Skeleton Shimmer Animation */
        .work-grid-item::before {
            content: "";
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
            transform: translateX(-100%);
            animation: shimmer 1.5s infinite;
            z-index: 1;
        }
        .work-grid-item.content-loaded::before { display: none; }
        
        @keyframes shimmer { 100% { transform: translateX(100%); } }
        
        .work-card { display: block; width: 100%; height: 100%; position: relative; z-index: 2; }
        
        /* Loading Bar */
        .loading-bar {
            position: absolute; bottom: 0; left: 0; height: 4px; width: 0%;
            background: var(--tp-red); 
            z-index: 5;
            transition: width 0.2s ease-in;
        }
        .work-card.loading .loading-bar {
            width: 70%; /* Simulate fetch progress */
            transition: width 1s ease-out;
        }

        /* Portrait Reels */
        .work-grid-item.reels {
            aspect-ratio: 9/16;
        }

        /* Landscape Films */
        .work-grid-item.films {
            width: 65.33%;
            aspect-ratio: 16/9;
        }
        .work-card.loaded .loading-bar {
            width: 100%;
            opacity: 0;
            transition: width 0.3s ease-out, opacity 0.3s ease-out 0.3s;
        }
        
        /* Lazy Load Styles */
        .work-card img, .work-card video { 
            width: 100%; height: 100%; object-fit: cover; 
            transition: transform 0.6s cubic-bezier(0.2, 1, 0.3, 1), opacity 0.5s ease; 
            opacity: 0; 
        }
        .work-card img.loaded, .work-card video.loaded { opacity: 1; }
        
        .work-card:hover img, .work-card:hover video { transform: scale(1.1); }
        
        .work-overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.8); display: flex; flex-direction: column;
            justify-content: center; align-items: center; opacity: 0; transition: 0.3s;
            color: #fff; text-align: center; padding: 20px; backdrop-filter: blur(3px);
        }
        .work-card:hover .work-overlay { opacity: 1; }
        .work-overlay h4 { 
            font-size: 16px; font-weight: 800; margin-bottom: 8px; 
            text-transform: uppercase; letter-spacing: 1px; transform: translateY(20px); transition: 0.4s;
        }
        .work-overlay span { 
            font-size: 11px; color: var(--tp-red); font-weight: 700; 
            text-transform: uppercase; letter-spacing: 2px; transform: translateY(20px); transition: 0.4s 0.1s;
        }
        .work-card:hover .work-overlay h4, 
        .work-card:hover .work-overlay span { transform: translateY(0); }

        @media (max-width: 1400px) {
            .sec-work-filter .container-fluid { max-width: 95vw; }
        }
        
        @media (max-width: 991px) {
            .sec-work-filter { height: auto; overflow: visible; padding: 60px 0; display: block; }
            .sec-work-filter .container-fluid { max-width: 100%; padding: 0 20px; }
            .work-grid-container { 
                height: auto; 
                max-height: 60vh; /* Limit height so user can scroll past it */
                overflow-y: auto; 
                padding-left: 0; 
                display: block; 
                margin-top: 20px;
            }
            .work-grid-item { width: 48%; margin-right: 2%; margin-bottom: 2%; } 
            .work-sidebar { 
                height: auto; margin-bottom: 20px; display: block; 
                border-right: none; border-bottom: 1px solid #eee; padding-bottom: 20px; padding-right: 0;
            }
            .grid-loader { top: 200px; left: 50%; }
            .project-filters-container { max-height: 200px; }
        }
        
        @media (max-width: 480px) {
            .work-grid-item { width: 100%; margin-right: 0; margin-bottom: 20px; }
        }
        /* Strategic CTA Section */
        .strategic-cta-section {
            padding: 100px 0;
            background: #0F0F0F; /* Dark background */
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .cta-content-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .cta-text h2 {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 15px;
            line-height: 1.1;
            color: #fff;
        }
        .cta-text p {
            font-size: 18px;
            color: #888;
            margin: 0;
            font-weight: 400;
            max-width: 500px;
        }
        .btn-cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: var(--tp-white);
            color: #000;
            padding: 18px 45px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            text-decoration: none;
            border: 1px solid transparent;
        }
        .btn-cta-primary:hover {
            background: var(--tp-red);
            color: #fff;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(230, 57, 70, 0.3);
        }
        
        @media (max-width: 991px) {
            .cta-content-wrapper {
                flex-direction: column;
                text-align: center;
                gap: 40px;
            }
            .cta-text h2 { font-size: 36px; }
            .cta-text p { margin: 0 auto; }
            .strategic-cta-section { padding: 80px 0; }
        }

        .highlight { color: var(--tp-red); }


        /* ================= HERO SPLIT LAYOUT ================= */
        .hero-split-layout {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            width: 100%;
        }

        .hero-left {
            flex: 0 0 50%;
            text-align: left;
            pointer-events: auto;
            color: #fff;
        }

        .hero-left h1 {
            font-size: clamp(40px, 4vw, 70px);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 24px;
            text-transform: uppercase;
            letter-spacing: -1px;
            opacity: 0;
            animation: fadeUp 0.8s ease forwards 0.5s;
        }

        .hero-left p {
            font-size: 18px;
            color: #ccc;
            margin-bottom: 32px;
            max-width: 90%;
            line-height: 1.6;
            opacity: 0;
            animation: fadeUp 0.8s ease forwards 0.7s;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            opacity: 0;
            animation: fadeUp 0.8s ease forwards 0.9s;
        }

        .btn-hero-primary {
            background: #fff;
            color: #000;
            padding: 14px 32px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 15px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }
        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255,255,255,0.2);
            background: var(--tp-red);
            color: #fff;
        }

        .btn-hero-secondary {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            padding: 14px 20px;
            font-weight: 700;
            font-size: 15px;
            text-transform: uppercase;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn-hero-secondary:hover {
            background: rgba(255,255,255,0.1);
            border-color: #fff;
        }
        
        .hero-right {
            flex: 1;
            height: 450px;
            pointer-events: auto;
            opacity: 0;
            animation: fadeIn 1s ease forwards 1s;
        }

        .bento-grid-hero {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(3, 1fr);
            gap: 15px;
            height: 100%;
        }

        .bhero-item {
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.1);
            background: #000;
        }

        .bhero-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .bhero-item:hover img {
            transform: scale(1.05);
        }

        /* Specific layout for 5 items */
        .bhero-item:nth-child(1) { grid-column: 1 / 3; grid-row: 1 / 3; } /* Main big image */
        .bhero-item:nth-child(2) { grid-column: 3; grid-row: 1; background: #111; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: 15px; }
        .bhero-item:nth-child(3) { grid-column: 3; grid-row: 2; }
        .bhero-item:nth-child(4) { grid-column: 1; grid-row: 3; }
        .bhero-item:nth-child(5) { grid-column: 2 / 4; grid-row: 3; }

        .stat-val { font-size: 32px; font-weight: 800; color: var(--tp-red); display: block; line-height: 1; margin-bottom: 5px; }
        .stat-txt { font-size: 11px; color: #aaa; text-transform: uppercase; letter-spacing: 1px; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* ================= HERO CREATIVE COLLAGE ================= */
        .hero-collage {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1000px;
        }

        .collage-main {
            width: 65%;
            aspect-ratio: 4/5;
            position: relative;
            z-index: 2;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            transform: rotateY(-5deg);
            transition: transform 0.5s ease;
            animation: float-v 6s ease-in-out infinite;
        }
        .hero-collage:hover .collage-main {
            transform: rotateY(0deg);
        }

        .collage-main img {
            width: 100%; height: 100%; object-fit: cover;
        }

        .collage-small {
            position: absolute;
            bottom: 10%;
            right: 5%;
            width: 40%;
            aspect-ratio: 1/1;
            z-index: 3;
            border-radius: 8px;
            overflow: hidden;
            border: 5px solid #000;
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
            animation: float-h 7s ease-in-out infinite 0.5s;
        }
        .collage-small img {
            width: 100%; height: 100%; object-fit: cover;
        }

        .collage-badge {
            position: absolute;
            top: 5%;
            right: 15%;
            width: 120px;
            height: 120px;
            z-index: 4;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: spin 10s linear infinite;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(5px);
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.1);
        }
        
        .badge-arrow {
            position: absolute;
            font-size: 24px;
            color: var(--tp-red);
            transform: rotate(-45deg);
        }

        .hee{
            margin-top: 120px;
            padding-top:40px;
        }

        /* Reels CTA Responsive Logic */
        .reels-grid .reel-cta-box {
            grid-column: auto;
        }
        @media (max-width: 991px) {
            .reels-grid { grid-template-columns: repeat(2, 1fr); }
            /* Make CTA full width on tablet to break rhythm */
            .reels-grid .reel-cta-box { grid-column: 1 / -1; min-height: 400px; }
        }
        @media (max-width: 576px) {
            .reels-grid { grid-template-columns: 1fr; }
            .reels-grid .reel-cta-box { grid-column: 1 / -1; min-height: 350px; }
        }
        
        .reel-cta-box:hover .cta-bg-gradient {
            background: linear-gradient(135deg, rgba(229,9,20,0.2) 0%, rgba(0,0,0,0.1) 100%) !important;
        }
        .reel-cta-box:hover .btn-primary {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(229,9,20,0.4);
        }

        @keyframes float-v {
            0%, 100% { transform: translateY(0) rotateY(-5deg); }
            50% { transform: translateY(-15px) rotateY(-5deg); }
        }
        @keyframes float-h {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(10px); }
        }
        @keyframes spin { 100% { transform: rotate(360deg); } }

        /* Mobile Adjustments */
        @media (max-width: 991px) {
            .hero-text-content {
                width: 95%; top: 55%; /* Adjust vertical center */
            }
            .hero-split-layout { flex-direction: column; text-align: center; justify-content: center; height: auto; gap: 30px; }
            .hero-left { max-width: 100%; margin-bottom: 0; }
            .hero-left h1 { font-size: 36px; text-align: center; margin-bottom: 15px; }
            .hero-left p { margin: 0 auto 20px; text-align: center; font-size: 16px; }
            .hero-buttons { justify-content: center; }
            .hero-right { display: none; } /* Hide grid on mobile to keep it from overlapping too much */
        }
        /* Cinematic Gallery "Director's Cut" */
        .films-showcase-section { background: #f9f9f9; border-top: 1px solid #e0e0e0; position: relative; overflow: hidden; }
        .films-showcase-section::before {
            content: "FILMS"; position: absolute; top: -20px; right: -20px;
            font-size: 200px; font-weight: 900; color: rgba(0,0,0,0.03);
            z-index: 0; pointer-events: none; line-height: 1;
        }
        .films-showcase-section:hover::before {
            content: "FILMS"; position: absolute; top: -20px; right: -20px;
            font-size: 200px; font-weight: 900; color: var(--tp-red);
            z-index: 0; pointer-events: none; line-height: 1; transition: color 0.5s ease;
        }

        /* Responsive Watermark */
        @media (max-width: 991px) {
            .films-showcase-section::before,
            .films-showcase-section:hover::before {
                font-size: 120px;
                top: 0;
            }
        }
        @media (max-width: 768px) {
            .films-showcase-section::before,
            .films-showcase-section:hover::before {
                font-size: 80px;
                top: 10px;
                opacity: 0.3;
            }
        }



        .cinema-grid {
            display: flex; flex-wrap: wrap; gap: 40px; margin-top: 60px;
            position: relative; z-index: 1;
        }

        .film-item { position: relative; margin-bottom: 40px; }
        
        /* Asymmetric Sizes */
        .film-item.wide { width: 100%; display: flex; align-items: flex-end; }
        .film-item.medium { width: calc(50% - 20px); }
        .film-item.featured { width: 60%; }
        .film-item.compact { width: 35%; align-self: center; }

        .film-card-cinema {
            background: #fff; box-shadow: 0 20px 60px rgba(0,0,0,0.08);
            border-radius: 0; overflow: hidden; /* Sharp corners for modern look */
            transition: transform 0.5s cubic-bezier(0.2, 1, 0.3, 1);
        }
        .film-card-cinema:hover { box-shadow: 0 30px 80px rgba(0,0,0,0.12); }

        .film-iframe-wrap { position: relative; padding-bottom: 56.25%; background: #000; }
        .film-iframe-wrap iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
        .film-iframe-wrap .youtube-facade { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }

        /* Typography & Overlays */
        .film-meta {
            padding: 30px 0; position: relative;
        }
        .film-index {
            font-size: 60px; font-weight: 600; color: #eee;
            position: absolute; top: -50px; left: 0; line-height: 1;
            z-index: -1; font-family: 'Oswald', sans-serif; /* Assuming font available or fallback */
        }
        .film-item:hover .film-index { color: var(--tp-red); transform: translateX(10px); transition: all 0.4s ease; }

        .film-content { padding-left: 20px; border-left: 2px solid var(--tp-red); margin-left: 10px; }
        .film-content h3 { font-size: 28px; font-weight: 800; color: #111; margin-bottom: 5px; text-transform: uppercase; letter-spacing: -0.5px; }
        .film-content p { font-size: 15px; color: #555; font-weight: 500; margin: 0; }

        /* Layout Tweaks */
        .film-item.wide .film-card-cinema { width: 70%; }
        .film-item.wide .film-meta { width: 30%; padding: 0 0 0 40px; margin-bottom: 40px; }
        
        /* Reveal numbers for medium items */
        .film-item.medium .film-card-cinema { width: 85%; margin-left: auto; } 

        @media (max-width: 991px) {
            .film-item.wide, .film-item.medium, .film-item.featured, .film-item.compact { width: 100%; display: block; }
            .film-item.wide .film-card-cinema { width: 100%; }
            .film-item.wide .film-meta { width: 100%; padding: 20px 0; }
            .film-item.medium .film-card-cinema { width: 100%; margin-left: 0; } /* Reset on mobile */
        }

        /* REELS SHOWCASE SECTION */
        .reels-showcase-section {
            background: #fff; /* Contrast with films section */
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid #e0e0e0;
        }

        .reels-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            margin-top: 60px;
            position: relative;
            z-index: 2;
        }

        .reel-item-modern {
            position: relative;
            transition: transform 0.4s ease;
        }
        
        /* Staggered offsets for visual interest */
        /* Dynamic Stagger for 3-Column Grid */
        .reel-item-modern:nth-child(3n+2) { transform: translateY(40px); }
        .reel-item-modern:nth-child(3n) { transform: translateY(80px); }

        .reel-card-modern {
            position: relative;
            width: 100%;
            padding-bottom: 177.77%; /* 9:16 Aspect Ratio */
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            background: #000;
        }

        .reel-card-modern video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        
        .reel-card-modern .youtube-facade {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .reel-item-modern:hover .reel-card-modern video {
            opacity: 1;
            transform: scale(1.05);
        }

        /* Numbering */
        .reel-index {
            position: absolute;
            top: -30px;
            left: -20px;
            font-size: 60px;
            font-weight: 900;
            color: rgba(0,0,0,0.05);
            font-family: 'Oswald', sans-serif;
            pointer-events: none;
            transition: all 0.4s ease;
            z-index: 2; /* Brought to front */
        }
        .reel-item-modern:hover .reel-index {
            color: var(--tp-red);
            font-size: 80px;
            top: -40px;
            left: -30px;
        }

        /* Hover Overlay for Play Icon/Text */
        .reel-overlay-info {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 30px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s ease;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
        }
        .reel-item-modern:hover .reel-overlay-info {
            opacity: 1;
            transform: translateY(0);
        }
        .reel-info-text h4 {
            color: #fff; font-size: 18px; margin: 0; text-transform: uppercase; font-weight: 700;
        }
        .reel-play-icon {
            width: 40px; height: 40px;
            background: #fff;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: #000;
        }

        /* REEL MUTE BUTTON (Top Right) */
        .reel-ui-top {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 5;
            opacity: 0; /* Hidden by default */
            transition: opacity 0.3s ease;
        }
        .reel-item-modern:hover .reel-ui-top { opacity: 1; } /* Show on hover */

        .reel-s-mute-btn {
            background: rgba(0,0,0,0.6);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }
        .reel-s-mute-btn:hover { background: var(--tp-red); border-color: var(--tp-red); transform: scale(1.1); }
        
        @media (max-width: 991px) {
            .reels-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
            .reel-item-modern:nth-child(n) { transform: none !important; } /* Remove stagger on mobile */
            .reel-index { font-size: 40px; top: -20px; left: -10px; }
            
            /* Disable hover scaling/effects on mobile */
            .reel-item-modern:hover .reel-card-modern,
            .reel-item-modern:active .reel-card-modern {
                transform: none !important;
            }
            .reel-item-modern:hover .reel-overlay-info {
                transform: translateY(0) !important;
            }
            
            /* Always show overlay logic */
            .reel-overlay-info { opacity: 1; transform: translateY(0); padding: 15px; transition: none !important; }
            .reel-info-text { display: none; } 
            
            .reel-ui-top { opacity: 1; } /* Always show mute btn on mobile */
        }
        @media (max-width: 576px) {
            /* Horizontal scroll layout for mobile */
            .reels-grid { 
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                overflow-y: hidden;
                gap: 15px;
                padding: 20px 0;
                scroll-snap-type: x mandatory;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none; /* Firefox */
            }
            .reels-grid::-webkit-scrollbar { display: none; } /* Chrome/Safari */
            
            .reel-item-modern {
                flex: 0 0 auto;
                width: 200px; /* Fixed width for horizontal scroll */
                scroll-snap-align: start;
            }
            
            .reel-card-modern {
                padding-bottom: 150%; /* Slightly taller aspect ratio for mobile */
            }
            
            /* Hide CTA box on mobile horizontal scroll to save space */
            .reel-cta-box {
                display: none !important;
            }
            
            .reel-index {
                font-size: 30px;
                top: -15px;
                left: -5px;
            }
        }

        #somettt:hover {
            color: #fff !important;
            background-color: rgba(255,255,255,0.1) !important;
            border-color: #fff !important;
        }

        /* Specific fix for Mr Furniture Logo */
        #mr-furniture-img {
            object-fit: contain !important;
            background-color: #f6f6f6; /* Matching light grey/white vibe */
            padding: 40px; /* Make image visually smaller */
        }
    </style>

    <!-- LocalBusiness Structured Data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Thumbpin",
      "image": "",
      "@id": "",
      "url": "https://www.thumbpin.in/",
      "telephone": "9773511447",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Spaze Itech Park, Tower B1, 6th floor, office 657, sector- 49 Gurugram - 122018",
        "addressLocality": "Gurugram",
        "postalCode": "122018",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 28.4132213,
        "longitude": 77.0434993
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday"
        ],
        "opens": "10:00",
        "closes": "19:00"
      } 
    }
    </script>
 @endsection

@section('content')
    <main>

    <!-- BreadcrumbList Structured Data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/", 
      "@type": "BreadcrumbList", 
      "itemListElement": [{
        "@type": "ListItem", 
        "position": 1, 
        "name": "Home",
        "item": "https://www.thumbpin.in/"  
      },{
        "@type": "ListItem", 
        "position": 2, 
        "name": "About",
        "item": "https://www.thumbpin.in/about"  
      },{
        "@type": "ListItem", 
        "position": 3, 
        "name": "Services",
        "item": "https://www.thumbpin.in/services"  
      },{
        "@type": "ListItem", 
        "position": 4, 
        "name": "Work",
        "item": "https://www.thumbpin.in/work"  
      },{
        "@type": "ListItem", 
        "position": 5, 
        "name": "Blog",
        "item": "https://www.thumbpin.in/blog"  
      },{
        "@type": "ListItem", 
        "position": 6, 
        "name": "Contact",
        "item": "https://www.thumbpin.in/contact"  
      },{
        "@type": "ListItem", 
        "position": 7, 
        "name": "Social Media Marketing",
        "item": "https://www.thumbpin.in/services/social-media-marketing"  
      },{
        "@type": "ListItem", 
        "position": 8, 
        "name": "Performance Marketing",
        "item": "https://www.thumbpin.in/services/performance-marketing"  
      },{
        "@type": "ListItem", 
        "position": 9, 
        "name": "Web Design",
        "item": "https://www.thumbpin.in/services/web-design"  
      },{
        "@type": "ListItem", 
        "position": 10, 
        "name": "Search Engine Optimization",
        "item": "https://www.thumbpin.in/services/seo"  
      }]
    }
    </script>





        {{-- ====================== AI CONTROLS ====================== --}}
        <div class="ai-controls-container">
            <!-- Gesture Button -->
            <button class="ai-btn" id="btn-enable-gesture">
                <span style="font-size:16px;">🖐️</span> AI Nav
            </button>
            
            <!-- Voice Button -->
            <button class="ai-btn" id="btn-enable-voice">
                <span style="font-size:16px;" id="voice-icon">🎙️</span> 
                <span id="voice-btn-text">Voice Cmd</span>
            </button>
        </div>

        <!-- Voice Transcript Display -->
        <div id="voice-transcript-overlay">
            <span class="vt-label">Listening...</span>
            <div class="vt-text" id="voice-text-content">"Show me your work"</div>
        </div>

        <!-- Confetti Canvas -->
        <canvas id="confetti-canvas"></canvas>

        <!-- Gesture UI Bar -->
        <div id="gesture-control-bar">
            <div class="gc-left">
                <div class="gc-cam-preview" id="gc-cam-box">
                    <video id="input_video" autoplay playsinline></video>
                </div>
                <div class="gc-status" id="gc-status-text">Ready</div>
                
                <div class="gc-instructions">
                    <div class="gc-item"><span class="gc-icon">☝️</span> 1=Home</div>
                    <div class="gc-item"><span class="gc-icon">✌️</span> 2=Expertise</div>
                    <div class="gc-item"><span class="gc-icon">🤟</span> 3=Works</div>
                    <div class="gc-item"><span class="gc-icon">🖖</span> 4=Process</div>
                    <div class="gc-item"><span class="gc-icon">🖐</span> 5=Contact</div>
                    <div class="gc-item"><span class="gc-icon">👍</span> Contact</div>
                </div>
            </div>
            <button class="gc-close-btn" id="btn-disable-gesture" title="Turn Off">
                <i class="fas fa-times"></i>
            </button>
        </div>

        {{-- Success Popup --}}
        <div id="thumbs-success">
            <i>👍</i>
            <h4 id="success-msg">Let's Connect...</h4>
        </div>

        {{-- ====================== 1. FIXED HERO (VIDEO BACKGROUND) ====================== --}}
        <div class="hero-fixed" id="sec-hero">
            {{-- Desktop Video --}}
            <video id="hero-video-bg" src="https://assets.thumbpin.in/thumbpin-videos/whatwedo2optimised.mp4" autoplay muted loop playsinline></video>
            {{-- Mobile Video - Only loaded on small screens via JS --}}
            <div id="hero-video-mobile-container"></div>
            <template id="hero-video-mobile-template">
                <video id="hero-video-mobile" src="https://assets.thumbpin.in/thumbpin-videos/optimisedforsmallerscreens.mp4" autoplay muted loop playsinline></video>
            </template>
            <div class="hero-video-overlay"></div>
            
            <!-- Headline Overlay - Centered with Inline Video -->
            <div class="hero-text-content hero-centered-text">
                <!-- Line 1: THUMBPIN -->
                <div class="hero-text-line">
                    <span>THUMBPIN</span>
                </div>
                
                <!-- Line 2: TRANSFORMS [VIDEO] YOUR -->
                <div class="hero-text-line">
                    <span>TRANSFORMS</span>
                    <div class="hero-video-pill" onclick="openVideoModal('https://assets.thumbpin.in/thumbpin-videos/whatwedo2optimised.mp4')" style="cursor: pointer;">
                        <video autoplay muted loop playsinline>
                            <source src="https://assets.thumbpin.in/thumbpin-videos/whatwedo2optimised.mp4" type="video/mp4">
                        </video>
                    </div>
                    <span>YOUR</span>
                </div>
                
                <!-- Line 3: VISION INTO -->
                <div class="hero-text-line">
                    <span class="txt-red">VISION</span>
                    <span>INTO</span>
                </div>
                
                <!-- Line 4: DIGITAL REALITY -->
                <div class="hero-text-line">
                    <span>DIGITAL</span>
                    <span class="txt-red">REALITY.</span>
                </div>
            </div>

            <div class="hero-overlay-gradient"></div>
            <div class="scroll-hint">Scroll Down</div>
        </div>

        {{-- ====================== 2. MAIN CONTENT ====================== --}}
        <div class="main-content-wrapper">
            
            {{-- INTRO (1) --}}
            <!-- <div class="sec-intro sec-padding" id="sec-intro">
                <div class="container">
                    <div class="intro-grid">
                        <div data-aos="fade-up">
                             <h2 class="big-statement">
                                 We Craft Narratives That <br>
                                 <span>Stick.</span>
                             </h2>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="200">
                            <p class="intro-desc">
                                Thumbpin is a 360° creative powerhouse. We don't just design logos; we build ecosystems where brands breathe, grow, and dominate their market.
                            </p>
                        </div>
                    </div>
                </div>
            </div> -->

                        <section class="what-we-do-section" id="what-we-do">
                <div class="section-container">
                    <div class="video-container reveal" onclick="openVideoModal('https://assets.thumbpin.in/thumbpin-videos/whatwedo2optimised.mp4')">
                        <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/place.png" alt="Video Placeholder" class="video-content" style="object-fit: cover; width:100%; height:100%;">
                        <div class="click-play-overlay">
                            <div class="big-play-btn">
                                <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="what-we-do-text reveal" style="transition-delay: 0.2s;">
                        <h2>WHAT<br>WE DO</h2>
                        <p class="what-we-do-desc">
                            We don't just make things look pretty. We solve business problems with creative solutions. Our approach is data-driven, design-led, and focused on growth.
                        </p>
                        <a href="#sec-work-filter" class="btn-chat" style="background: #000; color: #fff;">Explore Work</a>
                    </div>
                </div>

            {{-- Client Logos Marquee --}}
            <section class="clients-section">
                <div class="container">
                    <div class="client-header-classic">
                        <h2>Trusted By <span>Industry Leaders</span></h2>
                    </div>
                </div>
                {{-- Row 1: Fast Moving --}}
                <div class="marquee-container" style="margin-bottom: 30px;">
                    <div class="marquee-track track-fast">
                        <!-- Original Set -->
                        @for ($i = 1; $i <= 11; $i++)
                            <div class="client-logo">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/{{ $i }}.png" alt="Client {{ $i }}" loading="lazy" onerror="this.style.display='none'">
                            </div>
                        @endfor
                        <!-- Duplicate Set for Seamless Loop -->
                        @for ($i = 1; $i <= 11; $i++)
                            <div class="client-logo">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/{{ $i }}.png" alt="Client {{ $i }}" loading="lazy" onerror="this.style.display='none'">
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- Row 2: Slower Moving --}}
                <div class="marquee-container">
                    <div class="marquee-track track-slow">
                        <!-- Original Set -->
                        @for ($i = 12; $i <= 22; $i++)
                            <div class="client-logo">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/{{ $i }}.png" alt="Client {{ $i }}" loading="lazy" onerror="this.style.display='none'">
                            </div>
                        @endfor
                        <!-- Duplicate Set for Seamless Loop -->
                        @for ($i = 12; $i <= 22; $i++)
                            <div class="client-logo">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/{{ $i }}.png" alt="Client {{ $i }}" loading="lazy" onerror="this.style.display='none'">
                            </div>
                        @endfor
                    </div>
                </div>
            </section>
            </section>

            {{-- STRATEGIC CTA SECTION --}}
            <section class="strategic-cta-section reveal">
                <div class="container">
                    <div class="cta-content-wrapper">
                        <div class="cta-text">
                            <h2>Have a <span class="highlight">vision</span> in mind?</h2>
                            <p>Let's turn your ideas into digital reality. We are ready when you are.</p>
                        </div>
                        <div class="cta-action">
                            <a href="#sec-contact" class="btn-cta-primary">Start Your Project <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            {{-- CINEMATIC FILMS GALLERY --}}
            <section class="films-showcase-section sec-padding" id="sec-work-filter">
                <div class="container">
                    <div class="section-header-modern" style="margin-bottom: 60px;">
                        <h2 style="color: #111; font-size: 48px; text-transform: uppercase;">Directing <br><span class="txt-red">Attention.</span></h2>
                    </div>

                    <div class="cinema-grid">
                        
                        <!-- Featured Film: Ramaeri (Best Work) -->
                        <div class="film-item wide" style="border: 1px solid rgba(229, 9, 20, 0.3); background: rgba(229, 9, 20, 0.05); position: relative; margin-bottom: 60px;">
                            <div class="film-badge" style="position: absolute; top: -12px; left: 30px; background: #e50914; color: #fff; padding: 4px 12px; font-weight: 700; font-size: 11px; text-transform: uppercase; border-radius: 2px; letter-spacing: 1px; z-index: 5;">
                                Masterpiece
                            </div>
                            <div class="film-card-cinema">
                                <div class="film-iframe-wrap">
                                    <div class="youtube-facade" data-video-id="UJtRgvgHdxQ">
                                        <img src="https://img.youtube.com/vi/UJtRgvgHdxQ/hqdefault.jpg" alt="Ramaeri Shoot" loading="lazy">
                                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="film-meta">
                                <div class="film-content">
                                    <h3 style="color: #e50914;">Ramaeri Brand Shoot</h3>
                                    <p>Our best work to date. A cinematic journey.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Film 01: The Feature (Wide with Side Text) -->
                        <div class="film-item wide">
                            <div class="film-card-cinema">
                                <div class="film-iframe-wrap">
                                    <div class="youtube-facade" data-video-id="ncZ3Jh2d_4U">
                                        <img src="https://img.youtube.com/vi/ncZ3Jh2d_4U/hqdefault.jpg" alt="Film 1" loading="lazy">
                                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="film-meta">
                                <div class="film-index">01</div>
                                <div class="film-content">
                                    <h3>Film Shoot - Monko Dog</h3>
                                    <p>A masterpiece of motion and emotion.</p>
                                </div>
                            </div>
                        </div>


                        <div class="film-item wide" style="flex-direction: row-reverse;">
                            <div class="film-card-cinema">
                                <div class="film-iframe-wrap">
                                    <div class="youtube-facade" data-video-id="7OiAfYltdRU">
                                        <img src="https://img.youtube.com/vi/7OiAfYltdRU/hqdefault.jpg" alt="Film 2" loading="lazy">
                                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="film-meta" style="padding: 0 40px 0 0; text-align: right;">
                                <div class="film-index" style="left: auto; right: 0;">02</div>
                                <div class="film-content" style="border-left: none; border-right: 2px solid var(--tp-red); margin-left: 0; margin-right: 10px; padding-left: 0; padding-right: 20px;">
                                    <h3>Coporate Film - Good Earth Infra</h3>
                                    <p>Corporate film for Good Earth Infra.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Film 03: Medium -->
                        <div class="film-item medium">
                            <div class="film-card-cinema">
                                <div class="film-iframe-wrap">
                                    <div class="youtube-facade" data-video-id="uOqppmAt2eI">
                                        <img src="https://img.youtube.com/vi/uOqppmAt2eI/hqdefault.jpg" alt="Film 3" loading="lazy">
                                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="film-meta">
                                <div class="film-index">03</div>
                                <div class="film-content">
                                    <h3>Impact Production</h3>
                                    <p>High stakes, higher quality.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Film 04: The Closer (Wide) -->

                        <!-- Film 0: Medium -->
                        <div class="film-item medium">
                            <div class="film-card-cinema">
                                <div class="film-iframe-wrap">
                                    <div class="youtube-facade" data-video-id="-SHrTmRWpaI">
                                        <img src="https://img.youtube.com/vi/-SHrTmRWpaI/hqdefault.jpg" alt="Film 4" loading="lazy">
                                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="film-meta">
                                <div class="film-index">04</div>
                                <div class="film-content">
                                    <h3>Corporate Shoot - Bollhoff</h3>
                                    <p>Industrial excellence captured.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            {{-- REELS SHOWCASE SECTION --}}
            <section class="reels-showcase-section sec-padding">
                <div class="container">
                    <div class="section-header-modern" style="margin-bottom: 60px;">
                        <h2 style="color: #111; font-size: 48px; text-transform: uppercase;">Micro <br><span class="txt-red">Moments.</span></h2>
                    </div>

                    <div class="reels-grid">
                        <!-- Reel 1 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="_UagDA4XyFM">
                                    <img src="https://img.youtube.com/vi/_UagDA4XyFM/hqdefault.jpg" alt="Short Film #2" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <div class="reel-index">01</div>
                        </div>

                        <!-- Reel 2 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="MoEvrnlSy7U">
                                    <img src="https://img.youtube.com/vi/MoEvrnlSy7U/hqdefault.jpg" alt="Short Film" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <div class="reel-index">02</div>
                        </div>

                        <!-- Reel 3 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="sQcTZugZne0">
                                    <img src="https://img.youtube.com/vi/sQcTZugZne0/hqdefault.jpg" alt="Reel 3" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <div class="reel-index">03</div>
                        </div>

                        <!-- CTA CARD: Unique Placement -->
                        <!-- CTA CARD: Unique Placement -->
                        <div class="reel-item-modern reel-cta-box" style="display: flex; align-items: center; justify-content: center; background: #fff; border: 2px solid #eee; position: relative; overflow: hidden; min-height: 480px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                            
                            <div class="reel-cta-content" style="text-align: center; position: relative; z-index: 2; padding: 30px;">
                                <div class="cta-icon" style="color: var(--tp-red); font-size: 48px; margin-bottom: 25px; line-height: 1;">
                                    ✦
                                </div>
                                <h3 style="color: #111; font-size: 32px; font-weight: 800; margin-bottom: 12px; line-height: 1.1; text-transform: uppercase;">Your Brand.<br> <span style="color: var(--tp-red);">Next.</span></h3>
                                <p style="color: #666; font-size: 16px; margin-bottom: 35px; font-weight: 500;">Create impact with every second.</p>
                                <a href="#sec-contact" class="btn-primary" style="padding: 14px 35px; font-size: 14px; letter-spacing: 1px; text-transform: uppercase; font-weight: 700; background: var(--tp-red); color: #fff; border: none; border-radius: 4px; box-shadow: 0 5px 15px rgba(229,9,20,0.3);">Get Started</a>
                            </div>
                        </div>

                        <!-- Reel 4 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="V_-e9JaCnuM">
                                    <img src="https://img.youtube.com/vi/V_-e9JaCnuM/hqdefault.jpg" alt="Reel 4" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <div class="reel-index">04</div>
                        </div>

                        <!-- Reel 5 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="Oj4FmmUoCKA">
                                    <img src="https://img.youtube.com/vi/Oj4FmmUoCKA/hqdefault.jpg" alt="Reel 5" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <div class="reel-index">05</div>
                        </div>

                        <!-- Reel 6 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="CiKv3ezY9b8">
                                    <img src="https://img.youtube.com/vi/CiKv3ezY9b8/hqdefault.jpg" alt="Reel 6" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <div class="reel-index">06</div>
                        </div>
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="ee1nPF5evyQ">
                                    <img src="https://img.youtube.com/vi/ee1nPF5evyQ/hqdefault.jpg" alt="Reel 7" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <div class="reel-index">07</div>
                        </div>
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="4T8YyPqliog">
                                    <img src="https://img.youtube.com/vi/4T8YyPqliog/hqdefault.jpg" alt="Reel 8" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <div class="reel-index">08</div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ================= QUICK LINKS SECTION ================= --}}
            <section class="sec-quick-links">
                <div class="container">
                    <div class="quick-links-header">
                        <h2>Explore Our Work</h2>
                    </div>
                    <ul class="quick-links-list">
                        <li class="quick-link-item">
                            <a href="{{ route('digital') }}">
                                <h3 class="ql-title">Digital</h3>
                                <div class="ql-arrow">&rarr;</div>
                            </a>
                        </li>
                        <li class="quick-link-item">
                            <a href="{{ route('branding') }}">
                                <h3 class="ql-title">Branding</h3>
                                <div class="ql-arrow">&rarr;</div>
                            </a>
                        </li>
                        <li class="quick-link-item">
                            <a href="{{ route('print') }}">
                                <h3 class="ql-title">Print</h3>
                                <div class="ql-arrow">&rarr;</div>
                            </a>
                        </li>
                        <li class="quick-link-item">
                            <a href="{{ route('website') }}">
                                <h3 class="ql-title">Website</h3>
                                <div class="ql-arrow">&rarr;</div>
                            </a>
                        </li>
                        <li class="quick-link-item">
                            <a href="{{ route('film') }}">
                                <h3 class="ql-title">Film</h3>
                                <div class="ql-arrow">&rarr;</div>
                            </a>
                        </li>
                         <li class="quick-link-item">
                            <a href="{{ route('awards') }}">
                                <h3 class="ql-title">Awards</h3>
                                <div class="ql-arrow">&rarr;</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>

            
            <div class="sec-works" id="sec-works">
                 <div class="services-header hee">
                    <h2 style="color: #fff;">Featured <span class="text-red">Work</span></h2>
                    <p style="color: #999;">Big ideas. Bigger results.</p>
                </div>

                                <!-- <div class="services-header" style="margin-top: 120px;">
                    <h2 style="color: #fff;">Social <span class="text-red">Highlights</span></h2>
                    <p style="color: #999;">Visual stories that stop the scroll.</p>
                </div> -->

                <div class="square-gallery">
                    <div class="marquee-row marquee-row-1">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="square-item">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                            </div>
                        @endfor
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="square-item">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                            </div>
                        @endfor
                    </div>

                    <div class="marquee-row marquee-row-2">
                        @for ($i = 5; $i <= 8; $i++)
                            <div class="square-item">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                            </div>
                        @endfor
                        @for ($i = 5; $i <= 8; $i++)
                            <div class="square-item">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- Mobile Vertical Marquee Grid --}}
                <div class="social-vertical-grid">
                    <div class="social-col">
                        <div class="social-col-inner animate-up">
                            @for ($j=0; $j<4; $j++)
                                @for ($i = 1; $i <= 4; $i++) 
                                    <div class="square-item">
                                        <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                                    </div>
                                @endfor
                            @endfor
                        </div>
                    </div>
                    <div class="social-col">
                        <div class="social-col-inner animate-down">
                            @for ($j=0; $j<4; $j++)
                                @for ($i = 5; $i <= 8; $i++) 
                                    <div class="square-item">
                                        <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                                    </div>
                                @endfor
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="featured-work-grid">
                        <!-- Item 1 -->
                        <a href="{{ route('work') }}" class="work-item-link">
                            <div class="work-item">
                                <div class="work-content">
                                    <span class="work-cat">Branding / Identity</span>
                                    <h3 class="work-title">Tobako House</h3>
                                    <p class="work-desc">Premium retail assortment of cigars and hookah. Redefining luxury for the modern consumer.</p>
                                    <span class="work-link">View Case Study</span>
                                </div>
                                <div class="work-img">
                                    <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/our-work-1.webp" alt="Tobako House">
                                </div>
                            </div>
                        </a>
                        <!-- Item 2 -->
                        <a href="{{ route('work') }}" class="work-item-link">
                            <div class="work-item">
                                <div class="work-img">
                                    <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/our-work-2.webp" alt="Mr Furniture" id="mr-furniture-img">
                                </div>
                                <div class="work-content">
                                    <span class="work-cat">Manufacturing</span>
                                    <h3 class="work-title">Mr Furniture</h3>
                                    <p class="work-desc">Dubai-based office furniture customisation. Streamlining the workspace with elegance.</p>
                                    <span class="work-link">View Case Study</span>
                                </div>
                            </div>
                        </a>
                        <!-- Item 3 -->
                        <a href="{{ route('work') }}" class="work-item-link">
                            <div class="work-item">
                                <div class="work-content">
                                    <span class="work-cat">App Design / UI</span>
                                    <h3 class="work-title">Bloom</h3>
                                    <p class="work-desc">App designed to guide healthy habits & peace. A journey to self-discovery.</p>
                                    <span class="work-link">View Case Study</span>
                                </div>
                                <div class="work-img">
                                    <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/our-work-3.webp" alt="Bloom">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>









            {{-- Portfolio Section - Featured Work --}}
            {{-- Portfolio Section - NEW Minimal Design --}}
            <section class="portfolio-section-minimal" id="portfolio">
                <div class="container">
                    <div class="portfolio-mineral-header reveal">
                        <h2>Selected <strong style="color: var(--tp-red);">Work.</strong></h2>
                    </div>

                    <div class="case-minimal-wrapper">
                        
                        <!-- Case 1 -->
                        <div class="case-card-minimal reveal">
                            <div class="case-minimal-video" onclick="openVideoModal('https://assets.thumbpin.in/thumbpin-videos/casestudy2.mp4')">
                                <video muted loop playsinline preload="metadata">
                                    <source src="https://assets.thumbpin.in/thumbpin-videos/casestudy2.mp4" type="video/mp4">
                                </video>
                                <div class="case-play-btn">
                                    <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                                </div>
                            </div>
                            <div class="case-minimal-info">
                                <span class="case-min-tag">Strategic Branding</span>
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/mr.png" class="case-min-client-logo" alt="Mr Furniture">
                                <h3 class="case-min-title">From Newcomer to<br>Industry Leader.</h3>
                                <p class="case-min-desc">Strategic branding and sharp marketing helped this brand carve its niche in a competitive market.</p>
                            </div>
                        </div>

                        <!-- Case 2 (Alt Layout) -->
                        <div class="case-card-minimal alt-layout reveal">
                            <div class="case-minimal-video" onclick="openVideoModal('https://assets.thumbpin.in/thumbpin-videos/casestudy1.mp4')">
                                <video muted loop playsinline preload="metadata">
                                    <source src="https://assets.thumbpin.in/thumbpin-videos/casestudy1.mp4" type="video/mp4">
                                </video>
                                <div class="case-play-btn">
                                    <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                                </div>
                            </div>
                            <div class="case-minimal-info">
                                <span class="case-min-tag">Viral Campaign</span>
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/21.png" class="case-min-client-logo" alt="College Vidya">
                                <h3 class="case-min-title">An April Fool's Prank<br>That Sparked Conversation.</h3>
                                <p class="case-min-desc">Record-breaking engagement and real impact through a bold and calculated viral marketing campaign.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>



                <!-- <div class="services-header" style="margin-top: 120px;">
                    <h2 style="color:#fff;">Website <span class="text-red">Showcases</span></h2>
                    <p style="color: #999;">Digital experiences that deliver results.</p>
                </div>

                <div class="mockup-grid">
                    <div class="mockup-item reveal">
                        <div class="mockup-screen">
                            <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                                <source src="https://cdn.backternity.dev/api/videos/thumbpin/36c9fbae-8a9d-437c-a5ae-efd008b63b9f/master.m3u8" type="application/x-mpegURL">
                            </video>
                        </div>
                    </div>
                    <div class="mockup-item reveal" style="transition-delay: 0.2s;">
                        <div class="mockup-screen">
                            <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                                <source src="https://cdn.backternity.dev/api/videos/thumbpin/36163789-c02b-4ad8-81e1-1b24632e71df/master.m3u8" type="application/x-mpegURL">
                            </video>
                        </div>
                    </div>
                    <div class="mockup-item reveal" style="transition-delay: 0.2s;">
                        <div class="mockup-screen">
                            <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                                <source src="https://cdn.backternity.dev/api/videos/thumbpin/fb0df31f-e6b8-421b-9ad6-0b9d67ae3253/master.m3u8" type="application/x-mpegURL">
                            </video>
                        </div>
                    </div>
                    <div class="mockup-item reveal" style="transition-delay: 0.2s;">
                        <div class="mockup-screen">
                            <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                                <source src="https://cdn.backternity.dev/api/videos/thumbpin/122de18c-2308-4051-b197-640aef8ac785/master.m3u8" type="application/x-mpegURL">
                            </video>
                        </div>
                    </div>
                    <div class="mockup-item reveal" style="transition-delay: 0.2s;">
                        <div class="mockup-screen">
                            <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                                <source src="https://cdn.backternity.dev/api/videos/thumbpin/365d0ec2-be01-4f25-8f8a-fc491ce2ff11/master.m3u8" type="application/x-mpegURL">
                            </video>
                        </div>
                    </div>
                    <div class="mockup-item reveal" style="transition-delay: 0.2s;">
                        <div class="mockup-screen">
                            <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                                <source src="https://cdn.backternity.dev/api/videos/thumbpin/3f1f301c-11e5-4ca7-a037-0236fb9d2704/master.m3u8" type="application/x-mpegURL">
                            </video>
                        </div>
                    </div>
                </div> -->
            </section>


            <!--{{-- PROCESS (4) --}}-->
            <!--<div class="sec-process sec-padding" id="sec-process">-->
            <!--    <div class="container">-->
            <!--        <div class="section-header-modern">-->
            <!--            <h2>Our <span class="txt-red">Process</span></h2>-->
            <!--        </div>-->
            <!--        <div class="process-grid">-->
            <!--            <div class="process-step">-->
            <!--                <h3 class="process-title">Discovery</h3>-->
            <!--                <p class="process-desc">We start by listening. Understanding your brand is the foundation.</p>-->
            <!--            </div>-->
            <!--            <div class="process-step">-->
            <!--                <h3 class="process-title">Ideation</h3>-->
            <!--                <p class="process-desc">Our creative team brainstorms concepts aligned with your goals.</p>-->
            <!--            </div>-->
            <!--            <div class="process-step">-->
            <!--                <h3 class="process-title">Execution</h3>-->
            <!--                <p class="process-desc">We bring ideas to life through pixel-perfect design.</p>-->
            <!--            </div>-->
            <!--            <div class="process-step">-->
            <!--                <h3 class="process-title">Growth</h3>-->
            <!--                <p class="process-desc">We launch, monitor, and optimize for ROI.</p>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            {{-- RESOURCES (Bento - 5) --}}
            <!-- <div class="sec-resources" id="sec-resources">
                <div class="container">
                    <div class="section-header-modern text-center">
                        <h2>We Make Things <span class="txt-red">Insightcool</span></h2>
                    </div>
                    <div class="bento-grid">
                        <div class="bento-item nonchange" data-aos="fade-up">
                            <h3 class="bento-title">Get to Know Us</h3>
                            <p>Discover the culture and the people behind the stories we create.</p>
                            <a href="#" class="bento-link mt-3">Read More</a>
                        </div>
                        <div class="bento-item" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="bento-title">Join Our Team</h3>
                            <p>We are looking for creative minds.</p>
                            <a href="#" class="bento-link mt-3">Apply Now</a>
                        </div>
                        <div class="bento-item" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="bento-title">Brand Your Story</h3>
                            <p>Advertising is the aftertaste.</p>
                            <a href="#" class="bento-link mt-3">Start Project</a>
                        </div>
                    </div>
                </div>
            </div> -->

            {{-- CONTACT --}}
            <section class="sec-contact" id="sec-contact">
                <div class="contact-overlay-bg"></div>
                <div class="contact-inner" data-aos="fade-up">

                    {{-- LEFT: Copy & Perks --}}
                    <div class="contact-left-col">
                        <span class="contact-kicker">Let's Create Together</span>
                        <h2 class="contact-headline">Ready to Build<br>Something <span>Great?</span></h2>
                        <p class="contact-body-text">You have a vision — we have the strategy, creativity, and firepower to make it real. Drop us a brief — no strings attached.</p>
                        <ul class="contact-perks">
                            <li>Response within 2 business hours</li>
                            <li>End-to-end creative — concept to delivery</li>
                            <li>360° branding, advertising & production</li>
                        </ul>
                        <div class="contact-direct">
                            <a href="https://www.google.com/maps/search/?api=1&query=Beyond+Just+Work+Tower+A+Spaze+iTech+park+Sector+49+Gurgaon" target="_blank" style="align-items: flex-start;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-top: 3px; flex-shrink: 0;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                <span>12th floor, Beyond Just Work, Tower A, Spaze iTech park, Sector 49, Gurgaon</span>
                            </a>
                            <a href="tel:+919773511447">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.81a16 16 0 0 0 6.29 6.29l.95-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                +91 97735 11447
                            </a>
                            <a href="mailto:brajesh@thumbpin.in">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                brajesh@thumbpin.in
                            </a>
                        </div>
                    </div>

                    {{-- RIGHT: Form Card --}}
                    <div class="contact-card-new">

                        {{-- Voice AI --}}
                        <div style="margin-bottom: 24px; display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
                            <button type="button" id="voiceFormBtn" class="voice-ai-trigger" onclick="startFormVoiceInput()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>
                                <span id="formMicLabel">Speak to Fill Form</span>
                            </button>
                            <p id="formVoiceStatus" style="color: #555; font-size: 12px; margin: 0; display: none; flex:1;"></p>
                        </div>

                        <div id="form-messages" class="form-messages"></div>

                        <form action="{{ route('project-form') }}" method="post" id="homeContactForm">
                            @csrf
                            <input type="hidden" name="url" value="{{ Request::url() }}">
                            <div class="c-row">
                                <div class="c-field"><input type="text" id="inp-name" name="name" class="c-input" placeholder="Your Name *" required></div>
                                <div class="c-field"><input type="text" name="company_name" class="c-input" placeholder="Brand / Company"></div>
                            </div>
                            <div class="c-row">
                                <div class="c-field"><input type="email" name="email" class="c-input" placeholder="Email Address *" required></div>
                                <div class="c-field"><input type="tel" name="mobile" class="c-input" placeholder="Phone Number *" required></div>
                            </div>
                            <div class="c-field">
                                <textarea name="requirement" id="inp-req" rows="3" class="c-input" placeholder="Tell us about your project... *" required style="resize:vertical; min-height:90px;"></textarea>
                            </div>

                            <button type="submit" class="c-submit">Send Message &rarr;</button>

                            <div class="c-actions">
                                <button type="button" onclick="resetHomeForm()" class="c-btn-reset">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-5h5"/></svg>
                                    Reset
                                </button>
                                <a href="https://api.whatsapp.com/send?phone=919773511447" target="_blank" class="c-btn-wa">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.832-1.438A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18a8 8 0 01-4.34-1.272l-.31-.186-2.828.84.84-2.828-.186-.31A8 8 0 1112 20z"/></svg>
                                    WhatsApp Us
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </section>                                                                                                                                                                                                                                      

            {{-- ====================== ADVERTISING AGENCY SECTIONS ====================== --}}
            
            {{-- What We Do Section --}}
            <!-- <section class="what-we-do-section" id="what-we-do">
                <div class="section-container">
                    <div class="video-container reveal" onclick="openVideoModal('https://cdn.backternity.dev/api/videos/thumbpin/11a587a8-72ac-41da-a272-956e555bcd39/master.m3u8')">
                        <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/place.png" alt="Video Placeholder" class="video-content" style="object-fit: cover; width:100%; height:100%;">
                        <div class="click-play-overlay">
                            <div class="big-play-btn">
                                <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="what-we-do-text reveal" style="transition-delay: 0.2s;">
                        <h2>WHAT<br>WE DO</h2>
                        <p class="what-we-do-desc">
                            We don't just make things look pretty. We solve business problems with creative solutions. Our approach is data-driven, design-led, and focused on growth.
                        </p>
                        <a href="#services" class="btn-chat" style="background: #000; color: #fff;">Explore Services</a>
                    </div>
                </div>
            </section> -->




            {{-- Testimonials Section --}}
            <section class="testimonials-section">
                <div class="services-header">
                    <h2 style="color: #000;">Testimonials</h2>
                </div>

                @php
                $testimonials = [
                    ['name' => 'Sarthak garg', 'role' => 'Co-founder, College Vidya', 'img' => '21.png', 'text' => 'Brajesh has a very sharp eye to find out whats hidden, Their team did our brand audit and since then we grown as a brand then just a name. The energy is at peak at even 2AM. More Power to team.'],
                    ['name' => 'Prasad Duja Bhandari', 'role' => 'CEO, Mr. Furniture', 'img' => 'mr.png', 'text' => 'Thumbpin have helped us grow through five years they handled all things for us. Not just marketing but ideas for business and understand better at strategy front we have loved.  More years to go together.'],
                    ['name' => 'Vidur Khanna', 'role' => 'Director, Good Earth', 'img' => '6.png', 'text' => 'We did Rebranding from Galaxy Group to Good Earth Infra - "Building Tomorrow, Today", They did Brand Identity and Corporate Film. The Uniqueness they have it self driven. Love the energy they bring on table.'],
                    ['name' => 'Ujjwal Sitlani', 'role' => 'Founder, Ramaeri', 'img' => '22.png', 'text' => 'Thumbpin transformed our digital presence. Their innovative approach to marketing and branding helped us connect with our audience in meaningful ways, resulting in increased conversions.'],
                    ['name' => 'Anirudh Agrwal', 'role' => 'Senior Unit Manager, Bajaj Finserv', 'img' => '3.png', 'text' => 'I really appreciate the team for quick ideas as we keep running many campaigns. Should starting giving credits will be helpful for Brands. Totally recommend! 👍'],
                ];
                @endphp

                <div class="testimonials-wrapper">
                    <div class="testimonial-track" id="testiTrack">
                        @foreach($testimonials as $index => $t)
                        <div class="testi-card-v2 {{ $index == 1 ? 'active' : ($index == 0 ? 'prev' : 'next') }}" data-index="{{ $index }}">
                            <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/{{$t['img']}}" alt="{{$t['name']}}" class="testi-v2-logo" loading="lazy" onerror="this.src='https://placehold.co/100?text=C'">
                            <div class="testi-v2-meta">
                                <div class="testi-v2-role">{{$t['role']}}</div>
                                <div class="testi-v2-name">{{$t['name']}}</div>
                            </div>
                            <div class="testi-v2-quote-area">
                                <p class="testi-v2-text">{{$t['text']}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="testi-controls">
                        <button class="testi-btn" id="testiPrev">&#8249;</button>
                        <button class="testi-btn" id="testiNext">&#8250;</button>
                    </div>
                </div>
            </section>


        </div> 
    </main>
    
    {{-- Video Modal --}}
    <div id="videoModal" class="video-modal">
        <div class="modal-content" id="modalContent">
            <span class="close-modal" onclick="closeVideoModal()">&times;</span>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ offset: 60, duration: 800, easing: 'ease-out-cubic', once: true });

        // ================= PERFORMANCE: LAZY LOADING SYSTEM =================
        (function() {
            'use strict';
            
            // 1. MOBILE VIDEO LOADER - Only load on small screens
            function initMobileVideo() {
                const container = document.getElementById('hero-video-mobile-container');
                const template = document.getElementById('hero-video-mobile-template');
                
                if (!container || !template) return;
                
                // Only load mobile video on screens <= 768px
                if (window.innerWidth <= 768) {
                    const videoContent = template.content.cloneNode(true);
                    container.appendChild(videoContent);
                }
            }
            
            // 2. LAZY LOAD IFRAMES - Load only when scrolled into view
            function initLazyIframes() {
                // Select all iframes that should be lazy loaded (below hero section)
                const lazyIframes = document.querySelectorAll('.films-showcase-section iframe, .reels-showcase-section iframe');
                
                if ('IntersectionObserver' in window) {
                    const iframeObserver = new IntersectionObserver((entries, observer) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const iframe = entry.target;
                                // Store the src and restore it (for iframes already with src)
                                // This triggers the actual load
                                if (iframe.dataset.lazySrc) {
                                    iframe.src = iframe.dataset.lazySrc;
                                    iframe.removeAttribute('data-lazy-src');
                                } else if (!iframe.dataset.loaded) {
                                    // Mark as loaded to prevent re-triggering
                                    iframe.dataset.loaded = 'true';
                                }
                                observer.unobserve(iframe);
                            }
                        });
                    }, {
                        rootMargin: '200px 0px', // Start loading 200px before entering viewport
                        threshold: 0.01
                    });
                    
                    lazyIframes.forEach(iframe => {
                        // Convert src to data-lazy-src for deferred loading
                        if (iframe.src && !iframe.dataset.lazySrc) {
                            iframe.dataset.lazySrc = iframe.src;
                            iframe.removeAttribute('src');
                            // Add a placeholder loading state
                            iframe.style.backgroundColor = '#1a1a1a';
                        }
                        iframeObserver.observe(iframe);
                    });
                }
            }
            
            // 3. LAZY LOAD IMAGES BELOW FOLD (for images without native lazy loading)
            function initLazyImages() {
                const lazyImages = document.querySelectorAll('.main-content-wrapper img:not([loading])');
                
                if ('IntersectionObserver' in window) {
                    const imageObserver = new IntersectionObserver((entries, observer) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const img = entry.target;
                                if (img.dataset.src) {
                                    img.src = img.dataset.src;
                                    img.removeAttribute('data-src');
                                }
                                observer.unobserve(img);
                            }
                        });
                    }, {
                        rootMargin: '100px 0px',
                        threshold: 0.01
                    });
                    
                    lazyImages.forEach(img => imageObserver.observe(img));
                }
            }
            
            // 4. DEFER HEAVY SECTIONS - Load section content only when approaching
            function initDeferredSections() {
                const heavySections = document.querySelectorAll('.films-showcase-section, .reels-showcase-section');
                
                if ('IntersectionObserver' in window) {
                    const sectionObserver = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('section-loaded');
                            }
                        });
                    }, {
                        rootMargin: '300px 0px',
                        threshold: 0.01
                    });
                    
                    heavySections.forEach(section => sectionObserver.observe(section));
                }
            }
            
            // Initialize all lazy loading on DOM ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    initMobileVideo();
                    // Delay iframe loading to prioritize hero section
                    requestAnimationFrame(() => {
                        initLazyIframes();
                        initLazyImages();
                        initDeferredSections();
                    });
                });
            } else {
                initMobileVideo();
                requestAnimationFrame(() => {
                    initLazyIframes();
                    initLazyImages();
                    initDeferredSections();
                });
            }
        })();

        window.addEventListener('load', function() {
            $('header').removeClass('header_anime');
            

        });
        $(document).ready(function(){ $(window).scrollTop(0); });
        $(document).ready(function(){ 
            $(window).scrollTop(0); 

            // Contact Form AJAX
            $('.contact-form form').on('submit', function(e){
                e.preventDefault();
                var $form = $(this);
                var $btn = $form.find('button[type="submit"]');
                var originalText = $btn.text();
                
                $btn.prop('disabled', true).text('Sending...');
                
                $.ajax({
                    url: $form.attr('action'),
                    method: 'POST',
                    data: $form.serialize(),
                    success: function(response){
                        $form.fadeOut(300, function(){
                            $(this).parent().append(`
                                <div class="success-message" style="text-align: center; padding: 40px 20px;">
                                    <h3 style="color: var(--tp-red); margin-bottom: 15px; font-size: 28px;">Thank You!</h3>
                                    <p style="font-size: 18px; color: #333;">Your message has been sent successfully.<br>We will get back to you soon.</p>
                                </div>
                            `);
                        });
                        $form[0].reset();
                    },
                    error: function(xhr){
                        $('.contact-form .error-message').remove();
                        $form.prepend(`
                            <div class="error-message" style="color: #fff; background: #ff3333; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center;">
                                Something went wrong. Please check your inputs and try again.
                            </div>
                        `);
                        console.error(xhr);
                    },
                    complete: function(){
                        $btn.prop('disabled', false).text(originalText);
                    }
                });
            });
        });
        
        /* ================= HERO VIDEO BACKGROUND INIT ================= */
        function initHeroVideo() {
            const video = document.getElementById('hero-video-bg');
            if (!video) return;
            
            // MP4 plays natively, just ensure it starts
            video.play().catch(e => console.log('Autoplay prevented:', e));
        }
        
        // Initialize hero video on load
        window.addEventListener('load', function() {
            initHeroVideo();
        });


        /* ================= VOICE CONTROL ================= */
        const btnVoice = document.getElementById('btn-enable-voice');
        const voiceTextContent = document.getElementById('voice-text-content');
        const voiceOverlay = document.getElementById('voice-transcript-overlay');
        const voiceBtnText = document.getElementById('voice-btn-text');
        
        let recognition;
        let isVoiceActive = false;
        
        // Check Browser Support
        if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            recognition = new SpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true;
            recognition.lang = 'en-US';

            recognition.onstart = () => {
                isVoiceActive = true;
                btnVoice.classList.add('listening');
                voiceBtnText.innerText = "Listening...";
                voiceOverlay.style.display = 'block';
                voiceTextContent.innerText = "Say 'Services', 'Works', etc...";
            };

            recognition.onend = () => {
                // Auto restart if it was active
                if(isVoiceActive) {
                    recognition.start();
                } else {
                    btnVoice.classList.remove('listening');
                    voiceBtnText.innerText = "Voice Cmd";
                    voiceOverlay.style.display = 'none';
                }
            };

            recognition.onresult = (event) => {
                let interimTranscript = '';
                let finalTranscript = '';

                for (let i = event.resultIndex; i < event.results.length; ++i) {
                    if (event.results[i].isFinal) {
                        finalTranscript += event.results[i][0].transcript;
                        handleVoiceCommand(finalTranscript.toLowerCase());
                    } else {
                        interimTranscript += event.results[i][0].transcript;
                    }
                }
                
                if(interimTranscript || finalTranscript){
                      voiceTextContent.innerText = `"${interimTranscript || finalTranscript}"`;
                }
            };

            btnVoice.addEventListener('click', () => {
                if (isVoiceActive) {
                    isVoiceActive = false;
                    recognition.stop();
                    voiceOverlay.style.display = 'none';
                } else {
                    recognition.start();
                }
            });

        } else {
            btnVoice.style.display = 'none';
            console.log("Web Speech API not supported");
        }

        function handleVoiceCommand(cmd) {
            let target = null;
            let sectionName = "";

            // --- 1. Navigation Commands ---
            if (cmd.includes('go home') || cmd.includes('show home') || cmd.includes('go to top') || cmd.includes('back to top')) {
                target = '#sec-hero'; sectionName = "Home";
            } 
            else if (cmd.includes('service') || cmd.includes('expertise') || cmd.includes('offer') || cmd.includes('what you do') || cmd.includes('what do you do')) {
                target = '#sec-expertise'; sectionName = "Expertise";
            }
            else if (cmd.includes('work') || cmd.includes('portfolio') || cmd.includes('case study') || cmd.includes('project')) {
                target = '#sec-works'; sectionName = "Works";
            }
            else if (cmd.includes('process') || cmd.includes('step') || cmd.includes('method') || cmd.includes('how you work') || cmd.includes('how do you work')) {
                target = '#sec-process'; sectionName = "Process";
            }
            else if (cmd.includes('contact') || cmd.includes('hire') || cmd.includes('call') || cmd.includes('touch') || cmd.includes('message') || cmd.includes('get in touch')) {
                target = '#sec-contact'; sectionName = "Contact Us";
            }

            // --- 2. Smart Form Filling (FIXED) ---
            else if (cmd.includes('my name is') || cmd.includes('set name to') || cmd.includes('name is')) {
                // Remove trigger phrases to get the actual name
                let name = cmd.replace('my name is', '').replace('set name to', '').replace('name is', '').trim();
                const el = document.querySelector('input[name="name"]');
                if(el && name.length > 0) {
                    // Capitalize first letters
                    name = name.replace(/\b\w/g, l => l.toUpperCase());
                    el.value = name;
                    el.focus();
                    target = '#sec-contact';
                    speakResponse("Setting name to " + name);
                }
            }
            else if (cmd.includes('my email is') || cmd.includes('email is') || cmd.includes('set email to')) {
                let email = cmd.replace('my email is', '').replace('email is', '').replace('set email to', '').trim();
                // Smart replacements for email dictation
                email = email.replace(/ at /g, '@').replace(/ dot /g, '.').replace(/\s/g, '').toLowerCase();
                const el = document.querySelector('input[name="email"]');
                if(el && email.length > 0) {
                    el.value = email;
                    el.focus();
                    target = '#sec-contact';
                    speakResponse("Email set to " + email);
                }
            }
            else if (cmd.includes('my company is') || cmd.includes('company is') || cmd.includes('set company to')) {
                let company = cmd.replace('my company is', '').replace('company is', '').replace('set company to', '').trim();
                const el = document.querySelector('input[name="company_name"]');
                if(el && company.length > 0) {
                    company = company.replace(/\b\w/g, l => l.toUpperCase());
                    el.value = company;
                    el.focus();
                    target = '#sec-contact';
                    speakResponse("Company set to " + company);
                }
            }
            else if (cmd.includes('my phone is') || cmd.includes('phone is') || cmd.includes('number is') || cmd.includes('my number is')) {
                // Extract the phone part and remove all non-digits
                let phonePart = cmd.replace('my phone is', '').replace('phone is', '').replace('number is', '').replace('my number is', '').trim();
                const phone = phonePart.replace(/\D/g,''); // Extract only numbers
                const el = document.querySelector('input[name="mobile"]');
                if(el && phone.length > 0) {
                    el.value = phone;
                    el.focus();
                    target = '#sec-contact';
                    speakResponse("Phone number set to " + phone);
                }
            }

            // --- 3. Deep Linking / Specific Projects (NEW) ---
            else if (cmd.includes('tobako') || cmd.includes('tobacco') || cmd.includes('cigar')) {
                const items = document.querySelectorAll('.work-item');
                if(items[0]) {
                    items[0].scrollIntoView({behavior: 'smooth', block: 'center'});
                    speakResponse("Showing Tobako House case study");
                    return;
                }
            }
            else if (cmd.includes('furniture') || cmd.includes('office')) {
                const items = document.querySelectorAll('.work-item');
                if(items[1]) {
                    items[1].scrollIntoView({behavior: 'smooth', block: 'center'});
                    speakResponse("Showing Mr Furniture case study");
                    return;
                }
            }
            else if (cmd.includes('bloom') || cmd.includes('app') || cmd.includes('ui')) {
                const items = document.querySelectorAll('.work-item');
                if(items[2]) {
                    items[2].scrollIntoView({behavior: 'smooth', block: 'center'});
                    speakResponse("Showing Bloom App case study");
                    return;
                }
            }

            // --- 4. Scrolling Commands ---
            else if (cmd.includes('scroll up') || cmd.includes('go up') || cmd.includes('move up')) {
                window.scrollBy({top: -window.innerHeight/1.5, behavior: 'smooth'});
                speakResponse("Scrolling up");
                return;
            }
            else if (cmd.includes('scroll down') || cmd.includes('go down') || cmd.includes('move down')) {
                window.scrollBy({top: window.innerHeight/1.5, behavior: 'smooth'});
                speakResponse("Scrolling down");
                return;
            }
            else if (cmd.includes('scroll to top') || cmd.includes('go to top') || cmd.includes('back to top')) {
                window.scrollTo({top: 0, behavior: 'smooth'});
                speakResponse("Going to top");
                return;
            }
            else if (cmd.includes('scroll to bottom') || cmd.includes('go to bottom')) {
                window.scrollTo({top: document.body.scrollHeight, behavior: 'smooth'});
                speakResponse("Going to bottom");
                return;
            }

            // --- 5. Page Actions ---
            else if (cmd.includes('refresh') || cmd.includes('reload')) {
                speakResponse("Refreshing page");
                setTimeout(() => location.reload(), 500);
                return;
            }
            else if (cmd.includes('go back') || cmd.includes('previous page')) {
                speakResponse("Going back");
                setTimeout(() => window.history.back(), 500);
                return;
            }

            // --- 6. Video Controls ---
            else if (cmd.includes('play video') || cmd.includes('start video')) {
                const video = document.querySelector('#hero-main-video');
                if (video) {
                    video.play();
                    speakResponse("Playing video");
                }
                return;
            }
            else if (cmd.includes('pause video') || cmd.includes('stop video')) {
                const video = document.querySelector('#hero-main-video');
                if (video) {
                    video.pause();
                    speakResponse("Pausing video");
                }
                return;
            }
            else if (cmd.includes('mute video') || cmd.includes('silence')) {
                const video = document.querySelector('#hero-main-video');
                if (video) {
                    video.muted = true;
                    speakResponse("Muting video");
                }
                return;
            }
            else if (cmd.includes('unmute video') || cmd.includes('sound on')) {
                const video = document.querySelector('#hero-main-video');
                if (video) {
                    video.muted = false;
                    speakResponse("Unmuting video");
                }
                return;
            }

            // --- 7. Package Selection ---
            else if (cmd.includes('starter') || cmd.includes('startup') || cmd.includes('small business')) {
                target = '#sec-contact';
                speakResponse("Starter plan selected");
                setTimeout(() => {
                    const reqArea = document.getElementById('inp-req');
                    if(reqArea) reqArea.value = "Hi, I am interested in the Starter Package for my startup.";
                }, 1500);
            }
            else if (cmd.includes('growth') || cmd.includes('scaling')) {
                target = '#sec-contact';
                speakResponse("Growth plan selected");
                setTimeout(() => {
                    const reqArea = document.getElementById('inp-req');
                    if(reqArea) reqArea.value = "Hi, I am interested in scaling my business with the Growth Package.";
                }, 1500);
            }
            else if (cmd.includes('enterprise') || cmd.includes('premium')) {
                target = '#sec-contact';
                speakResponse("Enterprise plan selected");  
                setTimeout(() => {
                    const reqArea = document.getElementById('inp-req');
                    if(reqArea) reqArea.value = "Hi, I am interested in the Enterprise Package.";
                }, 1500);
            }

            // --- 8. Interactive & Fun ---
            else if (cmd.includes('stop') || cmd.includes('quiet') || cmd.includes('shut up')) {
                window.speechSynthesis.cancel();
                return;
            }
            else if (cmd.includes('read') && (cmd.includes('intro') || cmd.includes('about'))) {
                const text = document.querySelector('.intro-desc').innerText;
                speakResponse(text);
                return;
            }
            else if (cmd.includes('surprise me') || cmd.includes('party') || cmd.includes('celebrate')) {
                fireConfetti();
                speakResponse("Party Time! 🎉");
                return;
            }
            else if (cmd.includes('tell me a joke')) {
                const jokes = [
                    "Why do designers hate nature? It has too many bugs.",
                    "Why did the developer go broke? Because he used up all his cache!"
                ];
                speakResponse(jokes[Math.floor(Math.random() * jokes.length)]);
                return;
            }
            else if (cmd.includes('hello') || cmd.includes('hi')) {
                speakResponse("Hello! How can we help you navigate today?");
                return;
            }

            // --- Execution ---
            if (target) {
                // 1. Audio Feedback (only if not already spoken in specific blocks)
                // We check if it's a generic nav command
                if(!cmd.includes('name') && !cmd.includes('email') && !cmd.includes('company')) {
                    speakResponse("Sure");
                }
                
                // 2. Scroll
                const el = document.querySelector(target);
                if(el) {
                    el.scrollIntoView({behavior: 'smooth', block: 'start'});
                    
                    // Special Focus for Contact
                    if(target === '#sec-contact') {
                        setTimeout(() => { 
                            const nameInput = document.getElementById('inp-name');
                            if (nameInput) nameInput.focus();
                        }, 1000);
                    }
                }
            }
        }

        function speakResponse(text) {
            if ('speechSynthesis' in window) {
                const utterance = new SpeechSynthesisUtterance(text);
                utterance.rate = 1;
                utterance.pitch = 1;
                window.speechSynthesis.speak(utterance);
            }
        }

        // Lightweight Confetti Implementation
        function fireConfetti() {
            const canvas = document.getElementById('confetti-canvas');
            const ctx = canvas.getContext('2d');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            
            const pieces = [];
            const colors = ['#E63946', '#ffffff', '#000000', '#F1FAEE'];
            
            for (let i = 0; i < 100; i++) {
                pieces.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height - canvas.height,
                    color: colors[Math.floor(Math.random() * colors.length)],
                    size: Math.random() * 10 + 5,
                    speed: Math.random() * 5 + 2,
                    angle: Math.random() * 360
                });
            }
            
            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                pieces.forEach(p => {
                    p.y += p.speed;
                    p.angle += 2;
                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate(p.angle * Math.PI / 180);
                    ctx.fillStyle = p.color;
                    ctx.fillRect(-p.size/2, -p.size/2, p.size, p.size);
                    ctx.restore();
                    
                    if (p.y > canvas.height) p.y = -20;
                });
                requestAnimationFrame(animate);
            }
            
            animate();
            setTimeout(() => {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                pieces.length = 0; 
            }, 3000);
        }

        /* ================= GESTURE CONTROL (EXISTING) ================= */
        const videoElement = document.getElementById('input_video');
        const enableBtn = document.getElementById('btn-enable-gesture');
        const disableBtn = document.getElementById('btn-disable-gesture');
        const gestureBar = document.getElementById('gesture-control-bar');
        const camBox = document.getElementById('gc-cam-box');
        const statusText = document.getElementById('gc-status-text');
        const successPopup = document.getElementById('thumbs-success');
        const successMsg = document.getElementById('success-msg');
        
        let isGesturesActive = false;
        let lastFingerCount = -1;
        let debounceTimer = null;
        let isJumping = false;
        let mediaPipeLoaded = false;
        
        // Helper to load scripts dynamically
        function loadScript(src) {
            return new Promise((resolve, reject) => {
                const script = document.createElement('script');
                script.src = src;
                script.crossOrigin = 'anonymous';
                script.onload = resolve;
                script.onerror = reject;
                document.head.appendChild(script);
            });
        }
        
        // Lazy load MediaPipe scripts
        async function loadMediaPipeScripts() {
            if (mediaPipeLoaded) return true;
            
            try {
                await loadScript('https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js');
                await loadScript('https://cdn.jsdelivr.net/npm/@mediapipe/control_utils/control_utils.js');
                await loadScript('https://cdn.jsdelivr.net/npm/@mediapipe/hands/hands.js');
                mediaPipeLoaded = true;
                return true;
            } catch (e) {
                console.error('Failed to load MediaPipe scripts:', e);
                return false;
            }
        }

        enableBtn.addEventListener('click', async () => {
            enableBtn.innerHTML = "Loading AI...";
            
            // First, lazy load the MediaPipe scripts
            const scriptsLoaded = await loadMediaPipeScripts();
            if (!scriptsLoaded) {
                alert("Failed to load gesture recognition. Please try again.");
                enableBtn.innerHTML = "🖐️ AI Nav";
                return;
            }
            
            enableBtn.innerHTML = "Initializing...";
            const hands = new Hands({locateFile: (file) => `https://cdn.jsdelivr.net/npm/@mediapipe/hands/${file}`});
            
            hands.setOptions({ maxNumHands: 2, modelComplexity: 1, minDetectionConfidence: 0.7, minTrackingConfidence: 0.5 });
            hands.onResults(onResults);
            
            const camera = new Camera(videoElement, { onFrame: async () => { await hands.send({image: videoElement}); }, width: 320, height: 240 });
            try { 
                await camera.start(); 
                enableBtn.style.display = 'none'; 
                // Hide voice button if gesture is active to clear space? No, keep both.
                gestureBar.style.display = 'flex'; 
                isGesturesActive = true; 
            } 
            catch(e) { alert("Camera permission denied."); enableBtn.innerHTML = "🖐️ AI Nav"; }
        });

        disableBtn.addEventListener('click', () => { location.reload(); });

        function onResults(results) {
            if (!isGesturesActive) return;
            if (isJumping) return;

            let leftHandLandmarks = null;

            if (results.multiHandLandmarks && results.multiHandedness) {
                for (let i = 0; i < results.multiHandedness.length; i++) {
                    if (results.multiHandedness[i].label === 'Left') {
                        leftHandLandmarks = results.multiHandLandmarks[i];
                        break;
                    }
                }
            }

            if (leftHandLandmarks) {
                camBox.classList.remove('stopped'); 
                camBox.classList.add('active');

                if (checkThumbsUp(leftHandLandmarks)) {
                    triggerAction("sec-contact", "Contact");
                    return;
                }

                const fingers = countExtendedFingers(leftHandLandmarks);
                
                if (fingers !== lastFingerCount && fingers > 0) {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => {
                        handleJump(fingers);
                    }, 600); 
                }
                lastFingerCount = fingers;
                
            } else {
                if (results.multiHandLandmarks.length > 0) {
                    statusText.innerText = "Use Right Hand";
                    statusText.style.color = "#E63946";
                    camBox.className = "gc-cam-preview stopped";
                } else {
                    statusText.innerText = "Ready";
                    statusText.style.color = "#fff";
                    camBox.className = "gc-cam-preview";
                }
                lastFingerCount = -1;
            }
        }

        function handleJump(fingers) {
            let sectionId = "";
            let sectionName = "";

            switch(fingers) {
                case 1: sectionId = "sec-hero"; sectionName = "HOME"; break;
                case 2: sectionId = "sec-expertise"; sectionName = "EXPERTISE"; break;
                case 3: sectionId = "sec-works"; sectionName = "WORKS"; break;
                case 4: sectionId = "sec-process"; sectionName = "PROCESS"; break;
                case 5: sectionId = "sec-contact"; sectionName = "CONTACT"; break;
                default: return;
            }


            statusText.innerText = "JUMP: " + sectionName;
            statusText.style.color = "#2ecc71";
            speakResponse(sectionName); // AI Voice Feedback for Gesture too
            const el = document.getElementById(sectionId);
            
            if(el) {
                el.scrollIntoView({behavior: 'smooth', block: 'start'});
                isJumping = true;
                setTimeout(() => { isJumping = false; }, 800);
            }
        }

        function triggerAction(id, name) {
            if(successPopup.classList.contains('active')) return;
            statusText.innerText = "GO TO " + name;
            statusText.style.color = "#2ecc71";
            successPopup.classList.add('active');
            successMsg.innerText = "Let's Connect...";
            camBox.classList.add('thumbsup');
            speakResponse("Okay, contact section.");
            
            const el = document.getElementById(id);
            if(el) {
                el.scrollIntoView({behavior: 'smooth', block: 'center'});
                isJumping = true;
                setTimeout(() => { 
                    document.getElementById('inp-name').focus(); 
                    successPopup.classList.remove('active'); 
                    camBox.classList.remove('thumbsup'); 
                    isJumping = false;
                }, 2000);
            }
        }

        function countExtendedFingers(landmarks) {
            const wrist = landmarks[0];
            const tips = [8, 12, 16, 20];
            const pips = [6, 10, 14, 18];
            let openFingers = 0;
            
            for (let i = 0; i < tips.length; i++) {
                if (Math.hypot(landmarks[tips[i]].x - wrist.x, landmarks[tips[i]].y - wrist.y) > Math.hypot(landmarks[pips[i]].x - wrist.x, landmarks[pips[i]].y - wrist.y)) {
                    openFingers++;
                }
            }
            
            const thumbTip = landmarks[4];
            const indexMCP = landmarks[5];
            const thumbIP = landmarks[3];
            
            if (Math.hypot(thumbTip.x - indexMCP.x, thumbTip.y - indexMCP.y) > Math.hypot(thumbIP.x - indexMCP.x, thumbIP.y - indexMCP.y)) {
                 openFingers++; 
            }
            return openFingers;
        }

        function checkThumbsUp(landmarks) {
            const thumbTip = landmarks[4];
            const thumbIP = landmarks[3];
            const indexTip = landmarks[8];
            const indexMCP = landmarks[5];
            
            const isThumbUp = thumbTip.y < thumbIP.y;
            const isIndexCurled = indexTip.y > indexMCP.y;
            const isThumbHighest = thumbTip.y < indexTip.y;
            return isThumbUp && isIndexCurled && isThumbHighest;
        }

        /* ================= ADVERTISING AGENCY SCRIPTS ================= */
        
        // Video Modal Functions
        function openVideoModal(videoSource) {
            const modal = document.getElementById('videoModal');
            const modalContent = document.getElementById('modalContent');
            
            if (!modal || !modalContent) return;
            
            // Clear previous content
            const existingVideo = modalContent.querySelector('video');
            if (existingVideo) existingVideo.remove();
            
            // Create video element
            const video = document.createElement('video');
            video.controls = true;
            video.autoplay = true;
            video.style.maxWidth = '100%';
            video.style.maxHeight = '90vh';
            video.src = videoSource;
            
            modalContent.appendChild(video);
            video.play().catch(e => console.log('Autoplay prevented:', e));
            
            modal.style.display = 'flex';
        }
        
        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            const modalContent = document.getElementById('modalContent');
            
            if (!modal || !modalContent) return;
            
            const video = modalContent.querySelector('video');
            if (video) {
                video.pause();
                video.remove();
            }
            
            modal.style.display = 'none';
        }
        
        // Close modal on outside click
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('videoModal');
            if (e.target === modal) {
                closeVideoModal();
            }
        });
        
        // Toggle Mute Function for Reels
        function toggleMute(videoId, button) {
            const video = document.getElementById(videoId);
            if (video) {
                video.muted = !video.muted;
                button.classList.toggle('muted');
                button.querySelector('span').textContent = video.muted ? '🔇' : '🔊';
            }
        }
        
        // Testimonials Carousel
        let currentTestiIndex = 1;
        const testiCards = document.querySelectorAll('.testi-card-v2');
        const testiPrevBtn = document.getElementById('testiPrev');
        const testiNextBtn = document.getElementById('testiNext');
        
        function updateTestimonials() {
            testiCards.forEach((card, index) => {
                card.classList.remove('active', 'prev', 'next');
                
                if (index === currentTestiIndex) {
                    card.classList.add('active');
                } else if (index === currentTestiIndex - 1 || (currentTestiIndex === 0 && index === testiCards.length - 1)) {
                    card.classList.add('prev');
                } else if (index === currentTestiIndex + 1 || (currentTestiIndex === testiCards.length - 1 && index === 0)) {
                    card.classList.add('next');
                }
            });
        }
        
        if (testiPrevBtn) {
            testiPrevBtn.addEventListener('click', () => {
                currentTestiIndex = (currentTestiIndex - 1 + testiCards.length) % testiCards.length;
                updateTestimonials();
            });
        }
        
        if (testiNextBtn) {
            testiNextBtn.addEventListener('click', () => {
                currentTestiIndex = (currentTestiIndex + 1) % testiCards.length;
                updateTestimonials();
            });
        }
        
        // Reveal Animation on Scroll
        function revealOnScroll() {
            const reveals = document.querySelectorAll('.reveal');
            
            reveals.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('active');
                }
            });
        }
        
        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);
        
        // Portfolio Drag Functionality (Mobile)
        const portfolioShowcase = document.querySelector('.portfolio-showcase');
        const portfolioHint = document.querySelector('.portfolio-scroll-hint');
        
        if (portfolioShowcase && portfolioHint) {
            let isDown = false;
            let startX;
            let scrollLeft;
            let hasDragged = false;
            
            portfolioShowcase.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - portfolioShowcase.offsetLeft;
                scrollLeft = portfolioShowcase.scrollLeft;
            });
            
            portfolioShowcase.addEventListener('mouseleave', () => {
                isDown = false;
            });
            
            portfolioShowcase.addEventListener('mouseup', () => {
                isDown = false;
            });
            
            portfolioShowcase.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - portfolioShowcase.offsetLeft;
                const walk = (x - startX) * 2;
                portfolioShowcase.scrollLeft = scrollLeft - walk;
                
                if (!hasDragged) {
                    portfolioHint.classList.add('hidden');
                    hasDragged = true;
                }
            });
            
            // Touch events for mobile
            portfolioShowcase.addEventListener('touchstart', () => {
                if (!hasDragged) {
                    portfolioHint.classList.add('hidden');
                    hasDragged = true;
                }
            });
            
            // Limit drag translation to -155px
            portfolioShowcase.addEventListener('scroll', () => {
                const maxScroll = portfolioShowcase.scrollWidth - portfolioShowcase.clientWidth;
                if (portfolioShowcase.scrollLeft > maxScroll - 155) {
                    portfolioShowcase.scrollLeft = maxScroll - 155;
                }
            });
        }
        
        // YouTube Facade - Load iframe only on click (Performance Optimization)
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.youtube-facade').forEach(function(facade) {
                facade.addEventListener('click', function() {
                    const videoId = this.dataset.videoId;
                    const wrapper = this.parentElement;
                    const iframe = document.createElement('iframe');
                    iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
                    iframe.setAttribute('frameborder', '0');
                    iframe.setAttribute('allowfullscreen', '');
                    iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
                    iframe.style.cssText = 'position: absolute; top:0; left:0; width:100%; height:100%;';
                    this.style.display = 'none';
                    wrapper.appendChild(iframe);
                });
            });
        });

        // Initialize HLS for video thumbnails                                                                      
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof Hls !== 'undefined' && Hls.isSupported()) {
                document.querySelectorAll('.hls-thumbnail').forEach(video => {
                    const src = video.querySelector('source')?.src;
                    if (src && src.includes('.m3u8')) {
                        const hls = new Hls({
                            maxBufferLength: 10,
                            maxMaxBufferLength: 20
                        });
                        hls.loadSource(src);
                        hls.attachMedia(video);
                    }
                });
            }
        });
                                                                        
        // Testimonials Carousel with Complete Touch/Swipe Support
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.getElementById('testiTrack');
            const cards = document.querySelectorAll('.testi-card-v2');
            const prevBtn = document.getElementById('testiPrev');
            const nextBtn = document.getElementById('testiNext');
            let currentIndex = 1;
            const totalCards = cards.length;

            function updateCarousel() {
                cards.forEach((card, index) => {
                    card.classList.remove('active', 'prev', 'next', 'hidden');
                    
                    if (index === currentIndex) {
                        card.classList.add('active');
                    } else if (index === (currentIndex - 1 + totalCards) % totalCards) {
                        card.classList.add('prev');
                    } else if (index === (currentIndex + 1) % totalCards) {
                        card.classList.add('next');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            }

            function goToNext() {
                currentIndex = (currentIndex + 1) % totalCards;
                updateCarousel();
            }

            function goToPrev() {
                currentIndex = (currentIndex - 1 + totalCards) % totalCards;
                updateCarousel();
            }

            if (nextBtn && prevBtn) {
                nextBtn.addEventListener('click', goToNext);
                prevBtn.addEventListener('click', goToPrev);
            }

            // Touch/Swipe functionality
            if (track) {
                let touchStartX = 0;
                let touchEndX = 0;
                let touchStartY = 0;
                let touchEndY = 0;
                const swipeThreshold = 50;

                track.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                    touchStartY = e.changedTouches[0].screenY;
                }, { passive: true });

                track.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    touchEndY = e.changedTouches[0].screenY;
                    handleSwipe();
                }, { passive: true });

                // Mouse drag functionality for desktop
                let mouseStartX = 0;
                let mouseEndX = 0;
                let isDragging = false;

                track.addEventListener('mousedown', (e) => {
                    mouseStartX = e.clientX;
                    isDragging = true;
                    track.style.cursor = 'grabbing';
                });

                track.addEventListener('mousemove', (e) => {
                    if (!isDragging) return;
                    e.preventDefault();
                });

                track.addEventListener('mouseup', (e) => {
                    if (!isDragging) return;
                    mouseEndX = e.clientX;
                    isDragging = false;
                    track.style.cursor = 'grab';
                    handleMouseSwipe();
                });

                track.addEventListener('mouseleave', () => {
                    isDragging = false;
                    track.style.cursor = 'grab';
                });

                function handleSwipe() {
                    const deltaX = touchEndX - touchStartX;
                    const deltaY = Math.abs(touchEndY - touchStartY);

                    if (Math.abs(deltaX) > swipeThreshold && deltaY < Math.abs(deltaX)) {
                        if (deltaX > 0) {
                            goToPrev();
                        } else {
                            goToNext();
                        }
                    }
                }

                function handleMouseSwipe() {
                    const deltaX = mouseEndX - mouseStartX;

                    if (Math.abs(deltaX) > swipeThreshold) {
                        if (deltaX > 0) {
                            goToPrev();
                        } else {
                            goToNext();
                        }
                    }
                }

                track.style.cursor = 'grab';
            }

            updateCarousel();
        });

        // Portfolio Enhanced Drag with -155px Limit
        document.addEventListener('DOMContentLoaded', function() {
            const portfolioShowcase = document.querySelector('.portfolio-showcase');
            const portfolioHint = document.querySelector('.portfolio-scroll-hint');
            
            if (portfolioShowcase && portfolioHint) {
                let isDown = false;
                let startX;
                let scrollLeft;
                let hasDragged = false;
                
                portfolioShowcase.addEventListener('mousedown', (e) => {
                    isDown = true;
                    startX = e.pageX - portfolioShowcase.offsetLeft;
                    scrollLeft = portfolioShowcase.scrollLeft;
                    portfolioShowcase.style.cursor = 'grabbing';
                });
                
                portfolioShowcase.addEventListener('mouseleave', () => {
                    isDown = false;
                    portfolioShowcase.style.cursor = 'grab';
                });
                
                portfolioShowcase.addEventListener('mouseup', () => {
                    isDown = false;
                    portfolioShowcase.style.cursor = 'grab';
                });
                
                portfolioShowcase.addEventListener('mousemove', (e) => {
                    if (!isDown) return;
                    e.preventDefault();
                    const x = e.pageX - portfolioShowcase.offsetLeft;
                    const walk = (x - startX) * 2;
                    portfolioShowcase.scrollLeft = scrollLeft - walk;
                    
                    if (!hasDragged) {
                        portfolioHint.classList.add('hidden');
                        hasDragged = true;
                    }
                });
                
                // Touch events for mobile
                portfolioShowcase.addEventListener('touchstart', () => {
                    if (!hasDragged) {
                        portfolioHint.classList.add('hidden');
                        hasDragged = true;
                    }
                });
                
                // Translation limit: -155px maximum
                portfolioShowcase.addEventListener('scroll', () => {
                    const maxScroll = portfolioShowcase.scrollWidth - portfolioShowcase.clientWidth;
                    if (portfolioShowcase.scrollLeft > maxScroll - 155) {
                        portfolioShowcase.scrollLeft = maxScroll - 155;
                    }
                });
            }
        });

        // Reels Section Enhanced Mobile Scroll
        document.addEventListener('DOMContentLoaded', function() {
            const reelGrid = document.querySelector('.modern-reel-grid');
            if (!reelGrid) return;

            reelGrid.style.scrollBehavior = 'smooth';

            let isDown = false;
            let startX;
            let scrollLeft;

            reelGrid.addEventListener('mousedown', (e) => {
                isDown = true;
                reelGrid.style.cursor = 'grabbing';
                startX = e.pageX - reelGrid.offsetLeft;
                scrollLeft = reelGrid.scrollLeft;
            });

            reelGrid.addEventListener('mouseleave', () => {
                isDown = false;
                reelGrid.style.cursor = 'grab';
            });

            reelGrid.addEventListener('mouseup', () => {
                isDown = false;
                reelGrid.style.cursor = 'grab';
            });

            reelGrid.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - reelGrid.offsetLeft;
                const walk = (x - startX) * 3;
                reelGrid.scrollLeft = scrollLeft - walk;
            });
        });
    </script>
    <!-- iso-Tope Filter -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js" xintegrity="sha512-S5PZ9GxJZO16tT9r3WJp/Safn31eu8uWrzglMahDT4dsmgqWonRY9grk3j+3tfuPr9WJNsfooOR7Gi7HL5W2jw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" xintegrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous"></script>

    <script>
        // Work Filter Logic & Optimized Lazy Loading
        $(document).ready(function() {
            var $grid = $('.work-grid');
            var $loader = $('.grid-loader');
            
            // Initialize Isotope
            $grid.isotope({
                itemSelector: '.work-grid-item',
                layoutMode: 'fitRows',
                filter: '*'
            });

            // Lazy Load Function
            function loadVisibleImages() {
                // Get all visible items from Isotope
                var visibleItems = $grid.isotope('getFilteredItemElements');
                
                // Use Intersection Observer for visible items
                var observer = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var $item = $(entry.target);
                            var $card = $item.find('.work-card');
                            var $media = $item.find('img, video');
                            var src = $media.attr('data-src');
                            
                            if (src && !$media.attr('src')) {
                                // Start loading state
                                $card.addClass('loading');
                                
                                $media.attr('src', src);
                                
                                $media.on('load loadeddata', function() {
                                    $card.removeClass('loading').addClass('loaded');
                                    $item.addClass('content-loaded'); // Remove skeleton
                                    $(this).addClass('loaded');
                                });
                                
                                // For cached images
                                if ($media[0].complete) {
                                    $card.removeClass('loading').addClass('loaded');
                                    $item.addClass('content-loaded');
                                    $media.addClass('loaded');
                                }
                            }
                            observer.unobserve(entry.target);
                        }
                    });
                }, { root: document.querySelector('.work-grid-container'), rootMargin: '50px' });

                // Observe each visible item
                $(visibleItems).each(function() {
                    observer.observe(this);
                });
            }

            // Initial Load
            loadVisibleImages();
            $loader.addClass('hidden');
            $grid.addClass('loaded');

            // Filter items on button click
            $('.filter-group').on( 'click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
                
                // Reset scroll position
                $('.work-grid-container').scrollTop(0);
                
                // Active class management
                $('.filter-group button').removeClass('active');
                $(this).addClass('active');
            });
            
            // Re-trigger lazy load after filtering
            $grid.on('arrangeComplete', function() {
                loadVisibleImages();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reelItems = document.querySelectorAll('.reel-item-modern');
            const isTouch = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);
            
            // GLOBAL MUTE STATE (Default: Muted)
            let areReelsMuted = true;

            // Update all mute buttons to reflect the global state
            const updateAllMuteButtons = () => {
                reelItems.forEach(item => {
                    const btn = item.querySelector('.reel-s-mute-btn');
                    const icon = btn.querySelector('i');
                    if (areReelsMuted) {
                        icon.className = 'fas fa-volume-mute';
                        btn.classList.add('muted');
                    } else {
                        icon.className = 'fas fa-volume-up';
                        btn.classList.remove('muted');
                    }
                    
                    // Also update the video if it's currently playing?
                    // Or just let the interaction handle it.
                    // Ideally, if a video is playing, it should update immediately.
                    const video = item.querySelector('video');
                    if(video) video.muted = areReelsMuted;
                });
            };

            // Intersection Observer (Auto-Pause only)
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) {
                        const video = entry.target.querySelector('video');
                        if (video && !video.paused) {
                            video.pause();
                            updatePlayIcon(entry.target, 'paused');
                        }
                    }
                });
            }, { threshold: 0.4 });

            // Helper to toggle Play Icon
            const updatePlayIcon = (item, state) => {
                const icon = item.querySelector('.reel-play-icon i');
                if(icon) {
                    if(state === 'playing') {
                        icon.className = 'fas fa-pause';
                    } else {
                        icon.className = 'fas fa-play';
                    }
                }
            };

            reelItems.forEach(item => {
                const video = item.querySelector('video');
                const muteBtn = item.querySelector('.reel-s-mute-btn');
                
                if(!video) return;

                observer.observe(item);

                // MUTE BUTTON CLICK (Global Toggle)
                if(muteBtn) {
                    muteBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation(); // Don't trigger card click
                        
                        areReelsMuted = !areReelsMuted;
                        updateAllMuteButtons();
                    });
                }

                if (window.innerWidth > 991 && !isTouch) {
                    // DESKTOP: Hover to Play
                    item.addEventListener('mouseenter', () => {
                        // Apply global mute state
                        video.muted = areReelsMuted;
                        video.currentTime = 0;
                        
                        const playPromise = video.play();
                        if (playPromise !== undefined) {
                            playPromise.then(_ => {
                                updatePlayIcon(item, 'playing');
                            }).catch(err => {
                                // Autoplay blocked? Mute and try again
                                video.muted = true; 
                                video.play();
                            });
                        }
                    });

                    item.addEventListener('mouseleave', () => {
                        video.pause();
                        video.currentTime = 0;
                        updatePlayIcon(item, 'paused');
                    });

                } else {
                    // MOBILE: Click/Tap to Play
                    item.addEventListener('click', (e) => {
                        // If they clicked the mute button, do nothing (handled above)
                        if(e.target.closest('.reel-s-mute-btn')) return;

                        e.preventDefault();

                        // Pause others
                        reelItems.forEach(other => {
                            if(other !== item) {
                                const v = other.querySelector('video');
                                if(v && !v.paused) {
                                    v.pause();
                                    updatePlayIcon(other, 'paused');
                                }
                            }
                        });

                        video.muted = areReelsMuted; // Sync mute state
                        
                        if (video.paused) {
                            video.play();
                            updatePlayIcon(item, 'playing');
                        } else {
                            video.pause();
                            updatePlayIcon(item, 'paused');
                        }
                    });
                }
            });
            
            // Initial call to set button state
            updateAllMuteButtons();
        });
    </script>

    {{-- Contact Form Helper Functions --}}
    <script>
        // Reset form
        function resetHomeForm() {
            const form = document.getElementById('homeContactForm');
            if (form) {
                form.reset();
                const msgs = document.getElementById('form-messages');
                if (msgs) { msgs.style.display = 'none'; msgs.className = 'form-messages'; }
            }
        }

        // Voice AI Form Fill
        function startFormVoiceInput() {
            if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
                alert('Voice input is not supported in this browser. Please use Chrome.');
                return;
            }

            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            const recognition = new SpeechRecognition();
            recognition.lang = 'en-IN';
            recognition.interimResults = true;
            recognition.maxAlternatives = 1;

            const btn = document.getElementById('voiceFormBtn');
            const label = document.getElementById('formMicLabel');
            const status = document.getElementById('formVoiceStatus');

            btn.classList.add('listening');
            label.textContent = 'Listening...';
            status.style.display = 'block';
            status.textContent = 'Speak naturally: "My name is X, email is Y, phone is Z..."';

            recognition.start();

            recognition.onresult = function(event) {
                let transcript = '';
                for (let i = 0; i < event.results.length; i++) {
                    transcript += event.results[i][0].transcript;
                }
                status.textContent = '"' + transcript + '"';

                if (event.results[0].isFinal) {
                    parseVoiceToForm(transcript);
                }
            };

            recognition.onend = function() {
                btn.classList.remove('listening');
                label.textContent = 'Speak to Fill Form';
                setTimeout(() => { status.style.display = 'none'; }, 3000);
            };

            recognition.onerror = function(e) {
                btn.classList.remove('listening');
                label.textContent = 'Speak to Fill Form';
                status.textContent = 'Error: ' + e.error;
                setTimeout(() => { status.style.display = 'none'; }, 3000);
            };
        }

        function parseVoiceToForm(text) {
            const form = document.getElementById('homeContactForm');
            if (!form) return;
            const t = text.toLowerCase();

            // Name
            const nameMatch = t.match(/(?:my name is|name is|i am|i'm)\s+([a-z\s]+?)(?:,|\.|and|email|phone|mobile|company|from|$)/i);
            if (nameMatch) {
                const nameField = form.querySelector('[name="name"]');
                if (nameField) nameField.value = nameMatch[1].trim().replace(/\b\w/g, l => l.toUpperCase());
            }

            // Email
            const emailMatch = t.match(/(?:email is|email|mail is|mail)\s+([a-z0-9.\-_]+\s*(?:at|@)\s*[a-z0-9.\-]+\s*(?:dot|\.)\s*[a-z]+)/i);
            if (emailMatch) {
                const emailField = form.querySelector('[name="email"]');
                if (emailField) {
                    emailField.value = emailMatch[1].replace(/\s*at\s*/g, '@').replace(/\s*dot\s*/g, '.').replace(/\s/g, '');
                }
            }

            // Phone
            const phoneMatch = t.match(/(?:phone|mobile|number|call me at|call me on)\s*(?:is|number)?\s*([0-9\s]{7,})/i);
            if (phoneMatch) {
                const phoneField = form.querySelector('[name="mobile"]');
                if (phoneField) phoneField.value = phoneMatch[1].replace(/\s/g, '');
            }

            // Company
            const compMatch = t.match(/(?:company is|company name is|from|brand is|work at)\s+([a-z\s]+?)(?:,|\.|and|email|phone|$)/i);
            if (compMatch) {
                const compField = form.querySelector('[name="company_name"]');
                if (compField) compField.value = compMatch[1].trim().replace(/\b\w/g, l => l.toUpperCase());
            }

            // Requirement - use the full text if nothing else matched or append remainder
            const reqMatch = t.match(/(?:project|requirement|need|looking for|want)\s+(?:is\s+)?(.+)/i);
            if (reqMatch) {
                const reqField = form.querySelector('[name="requirement"]');
                if (reqField) reqField.value = reqMatch[1].trim().charAt(0).toUpperCase() + reqMatch[1].trim().slice(1);
            }
        }
    </script>
@endsection
