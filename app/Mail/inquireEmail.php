<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class inquireEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $cartList, $firstname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstname, $cartList)
    {
        $this->cartList = $cartList;
        $this->firstname = $firstname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.inquireEmail')->subject('Inquire Email');
    }
}
