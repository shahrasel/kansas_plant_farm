<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'firstname'=>['required'],
            'lastname'=>['required'],
            'email'=>['required','email'],
            'phone'=>['required'],
            'date'=>['required'],
            'time'=>['required']
        ]);

        $appointment = new Appointment();
        $appointment->firstname = $request->firstname;
        $appointment->lastname = $request->lastname;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->message = $request->message;

        $appointment->save();
    }
}
