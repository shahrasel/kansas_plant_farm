<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class preoOrderConfirmation extends Mailable
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
        return $this->view('emails.preOrderConfirmation')->subject('Pickup Confirmation on Order No: 9988779');
    }
}
