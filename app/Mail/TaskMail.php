<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->data['file'] == null){
            return $this->subject("#".$this->data['id']." New ".$this->data['type']." Enquiry ")
                    ->view('mails.task-mail');
        }else{
            return $this->subject("#".$this->data['id']." New ".$this->data['type']." Enquiry ")
                    ->view('mails.task-mail')->attach($this->data['file']->getRealPath(), [
                        'as' => $this->data['file'],
                        'mime' => $this->data['file']->getMimeType()
                     ]);
        }
    }
}
