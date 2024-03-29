<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class checkoutConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $cartList, $firstname, $orderid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstname, $cartList, $orderid)
    {
        $this->cartList = $cartList;
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
        return $this->view('emails.checkoutConfirmation')->subject('Order Confirmation from Kansas Plant Farm!');
    }
}
