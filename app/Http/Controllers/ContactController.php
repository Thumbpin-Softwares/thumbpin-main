<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\InquiryMail;
use App\Mail\TaskMail;
use App\Mail\ProjectFormMail;
use App\Models\Contact;
use App\Models\InquiryForm;
use App\Models\ProjectForm;
use App\Models\TaskForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){

        $contact = new Contact();
        $contact->name = request()->input('name');
        $contact->email = request()->input('email');
        $contact->mobile = request()->input('mobile');
        $contact->message = request()->input('message');
        $contact->url = request()->input('url');
        $contact->ip = $_SERVER['REMOTE_ADDR'];
        $contact->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $contact->save();

        $data = array(
            'id' => $contact->id,
            'name' => $contact->name,
            'email' => $contact->email,
            'mobile' => $contact->mobile,
            'message' => $contact->message,
            'url' => $contact->url,
            'type' => 'Contact Form'
        );

        // Mail::to(env('MAIL_TO_ADDRESS'))->send(new ContactMail($data));

        return redirect(route('thank-you'));

    }

    public function inquiry_form(){
        $contact = new InquiryForm();
        $contact->name = request()->input('name');
        $contact->email = request()->input('email');
        $contact->mobile = request()->input('mobile');
        $contact->country = request()->input('country');
        $contact->requirement = request()->input('requirement');
        $contact->url = request()->input('url');
        $contact->ip = $_SERVER['REMOTE_ADDR'];
        $contact->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $contact->save();

        $data = array(
            'id' => $contact->id,
            'name' => $contact->name,
            'country' => $contact->country,
            'email' => $contact->email,
            'mobile' => $contact->mobile,
            'requirement' => $contact->requirement,
            'url' => $contact->url,
            'type' => 'Side Form'
        );

        // Mail::to(env('MAIL_TO_ADDRESS'))->send(new InquiryMail($data));

        return redirect(route('thank-you'));

    }

    public function task_submit(Request $request)
    {
        $task = new TaskForm();
        $task->task = request()->input('task');
        $task->url = request()->input('url');
        $task->ip = $_SERVER['REMOTE_ADDR'];
        $task->user_agent = $_SERVER['HTTP_USER_AGENT'];

        $images = '';
        if (request()->hasFile('file')) {
            $voyagerData = [];
            $image = request()->file('file');
            $newImage = time() . '.' . $image->getClientOriginalExtension();
            $images = $image->move('storage/task_file', $newImage);

            $f = [];
            $f['download_link'] = 'task_file/'.$newImage;
            $f['original_name'] = $image->getClientOriginalName();
            array_push($voyagerData, $f);
            $task->image = json_encode($voyagerData);
        }

        $task->save();

        $data = array(
            'id' => $task->id,
            'task' => $task->task,
            'file' => $images,
            'url' => $task->url,
            'type' => 'task form'
        );

        Mail::to(env('MAIL_TO_ADDRESS'))->send(new TaskMail($data));
        return redirect(route('thank-you'));
    }
    public function project_form(){
        request()->validate([
            'mobile' =>'required|numeric|digits_between:10,15',
        ]);
        $project = new ProjectForm();
        $project->name = request()->input('name');
        $project->company_name = request()->input('company_name');
        $project->email = request()->input('email');
        $project->mobile = request()->input('mobile');
        $project->requirement = request()->input('requirement');
        $project->url = request()->input('url');
        $project->ip = $_SERVER['REMOTE_ADDR'];
        $project->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $project->save();

        $data = array(
            'id' => $project->id,
            'name' => $project->name,
            'company_name' => $project->company_name,
            'email' => $project->email,
            'requirement' => $project->requirement,
            'url' => $project->url,
            'type' => 'Index Form'
        );

        // Mail::to(env('MAIL_TO_ADDRESS'))->send(new ProjectFormMail($data));

        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Thank you! We\'ll be in touch shortly.']);
        }

        return redirect(route('thank-you'));

    }
}
