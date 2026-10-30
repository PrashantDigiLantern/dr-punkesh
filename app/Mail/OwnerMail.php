<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OwnerMail extends Mailable
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
        
        if($this->details['page'] == 'appointment-owner'){
            return $this->subject('New Appointment Details')->view('mail.appointment-owner-mail');
        }
        if($this->details['page'] == 'contact-owner'){
            return $this->subject('New Contact Details')->view('mail.contactus-owner-mail');
        }
        if($this->details['page'] == 'request-owner'){
            return $this->subject('New Contact Details')->view('mail.quotes-owner-mail');
        }
        //return $this->view('view.name');
    }
}
