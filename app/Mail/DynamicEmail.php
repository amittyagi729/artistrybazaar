<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\EmailTemplate;

class DynamicEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject;
    public $body;
    public function __construct($templateId, $data)
    {
        $template = EmailTemplate::findOrFail($templateId);

        // Replace variables in the email body
        foreach ($data as $key => $value) {
            $template->body = str_replace('{{ ' . $key . ' }}', $value, $template->body);
        }
        $this->subject = $template->subject;
        $this->body = $template->body;
    }
    
    public function build()
    {
        return $this->view('emails.dynamic_template');
    }
}
