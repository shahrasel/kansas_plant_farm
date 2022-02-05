<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmationCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $firstName, $date, $time, $cancellationURL;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstName, $date, $time, $cancellationURL)
    {
        //
        $this->firstName = $firstName;
        $this->date = $date;
        $this->time = $time;
        $this->cancellationURL = $cancellationURL;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.appointmentConfirmationCustomer')->subject('KANSAS PLANT FARM APPOINTMENT CONFIRMED!');;
    }
}
