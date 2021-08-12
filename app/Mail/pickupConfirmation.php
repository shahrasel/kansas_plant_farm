<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class pickupConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $cartList, $firstname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstname, $orderdetails_lists, $orderid)
    {
        $this->orderdetails_lists = $orderdetails_lists;
        $this->firstname = $firstname;
        $this->orderid = $orderid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pickupConfirmation')->subject('Pickup Confirmation on Order No: '.$this->orderid);
    }
}
