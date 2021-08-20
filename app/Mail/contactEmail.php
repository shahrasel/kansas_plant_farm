<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $street, $city, $state, $zip, $email, $phone, $comment, $plantreq;
    public $checklist = array();

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $street, $city, $state, $zip, $email, $phone, $comment, $plantreq,$checklist)
    {
        $this->name = $name;
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->email = $email;
        $this->phone = $phone;
        $this->comment = $comment;
        $this->plantreq = $plantreq;
        $this->checklist = $checklist;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contactEmail')->subject('New KPF Contact Message!!!');
    }
}
