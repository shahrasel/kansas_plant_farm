<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentCancellationAdmin;
use App\Mail\AppointmentCancellationCustomer;
use App\Mail\AppointmentConfirmationAdmin;
use App\Mail\AppointmentConfirmationCustomer;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::orderby('id','Desc')->paginate(20);
        return view('admin.appointment.index', [
            'appointments' => $appointments
        ]);
    }

    public function destroy($id) {
        $appointment = Appointment::find($id);
        $appointment->delete($id);

        return redirect(url('admin/appointments'));
    }

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

        $cancellationURL = URL::signedRoute('cancellation', ['appointment' => $appointment->id]);

        Mail::to($request->email)
            ->send(new AppointmentConfirmationCustomer($request->firstname, $request->date, $request->time, $cancellationURL));

        foreach (['kansasplantfarm@gmail.com'] as $recipient) {
            Mail::to($recipient)
                ->send(new AppointmentConfirmationAdmin($appointment));
        }
    }

    public function cancellation(Request $request, Appointment $appointment)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        $appointment->delete();

        Mail::to($appointment->email)
            ->send(new AppointmentCancellationCustomer($appointment));

        foreach (['kansasplantfarm@gmail.com'] as $recipient) {
            Mail::to($recipient)
                ->send(new AppointmentCancellationAdmin($appointment));
        }

        return view('calendar.appointment_cancel',[
            'appointment' => $appointment
        ]);
    }
}
