<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      //  return $this->subject($this->details['orgname'])->view('mail.appointment-user-mail');
        
        if ($this->details['page'] == 'appointment-user') {
            return $this->subject('Thank you for your enquiry')->view('mail.appointment-user-mail');
        }
        if ($this->details['page'] == 'contact-user') {
            return $this->subject('Thank you for your enquiry')->view('mail.contactus-user-mail');
        }
        if ($this->details['page'] == 'quotes-user') {
            return $this->subject('Thank you for your enquiry')->view('mail.quotes-user-mail');
        }
    }
}
