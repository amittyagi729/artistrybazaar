<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CouponMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $couponCode;
    public $email;
    public function __construct($couponCode, $email)
    {
        $this->couponCode = $couponCode;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      
    return $this->subject('Exclusive Savings Inside! Unlock Your Special Coupon Code 🎁')->view('emails.coupon-mail', ['couponCode' => $this->couponCode, 'email' => $this->email]);

    }
}
