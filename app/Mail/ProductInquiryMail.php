<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inquirydata;
  
    public function __construct($inquirydata)
    {
        $this->inquirydata = $inquirydata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.product-inquiry',['inquirydata' => $this->inquirydata])->subject('Product Inquiry');
        
    }
}
