<?php

namespace App\Http\Controllers;

use App\Models\AppointmentCalendar;
use Illuminate\Http\Request;

class AppointmentCalendarController extends Controller
{
    public function showCalendar()
    {
        $appointment_calendar = AppointmentCalendar::first();
        //dd($appointment_calendar);

        return view('calendar.calendar', [
            'calendar_info' => $appointment_calendar
        ]);
    }

    public function getAvailableTiming(Request $request)
    {
        //dd(date('Y-m-d h:y:s a',strtotime($request->date1)));
        $splitted_time = explode('-',$request->date1);
        $selected_timestamp = mktime(12,00,01,$splitted_time[1],$splitted_time[2],$splitted_time[0]);
        $selected_day = strtolower(date('l',mktime(12,00,01,$splitted_time[1],$splitted_time[2],$splitted_time[0])));
        //dd($selected_day);


        $appointment_calendar = AppointmentCalendar::first();
        //dd($appointment_calendar->tuesday_1);

        $updated_timestamp = mktime(12,00,01,$appointment_calendar->updated_at->format('m'),$appointment_calendar->updated_at->format('d'),$appointment_calendar->updated_at->format('Y'));


        $time_duration = (($selected_timestamp - $updated_timestamp)/86400);
        $time_slots = array();
        if($time_duration <= 7) {
            $selected_day = $selected_day."_1";
            $time_slots = $appointment_calendar->$selected_day;
        }
        elseif ($time_duration > 7 && $time_duration <= 14) {
            $selected_day = $selected_day."_2";
            $time_slots = $appointment_calendar->$selected_day;
        }
        else {
            $sel_int_div = intdiv($time_duration,7);

            if($sel_int_div %2 == 1) {
                $selected_day = $selected_day."_2";
                $time_slots = $appointment_calendar->$selected_day;
            }
            else {
                $selected_day = $selected_day."_1";
                $time_slots = $appointment_calendar->$selected_day;
            }
        }
        //dd(json_decode($time_slots));
        echo $time_slots;
        exit;
    }

    public function appointment(Request $request)
    {
        return view('calendar.appointment');
    }

    public function sendAppointment(Request $request)
    {
        dd($request);
    }

    public function edit()
    {
        $appointment_calendar = AppointmentCalendar::find(1);
        //dd($appointment_calendar);
        return view('admin.appointment_calendar.edit', [
            'calendar_info' => $appointment_calendar
        ]);
    }

    public function update(Request $request)
    {
        //dd($request);
        $appointment_calendar = AppointmentCalendar::find(1);
        $appointment_calendar->all_monday_1 = $request->post('all_monday_1');
        $appointment_calendar->monday_1 = json_encode($request->post('monday_1'));

        $appointment_calendar->all_tuesday_1 = $request->post('all_tuesday_1');
        $appointment_calendar->tuesday_1 = json_encode($request->post('tuesday_1'));

        $appointment_calendar->all_wednesday_1 = $request->post('all_wednesday_1');
        $appointment_calendar->wednesday_1 = json_encode($request->post('wednesday_1'));

        $appointment_calendar->all_thursday_1 = $request->post('all_thursday_1');
        $appointment_calendar->thursday_1 = json_encode($request->post('thursday_1'));

        $appointment_calendar->all_friday_1 = $request->post('all_friday_1');
        $appointment_calendar->friday_1 = json_encode($request->post('friday_1'));

        $appointment_calendar->all_saturday_1 = $request->post('all_saturday_1');
        $appointment_calendar->saturday_1 = json_encode($request->post('saturday_1'));

        $appointment_calendar->all_sunday_1 = $request->post('all_sunday_1');
        $appointment_calendar->sunday_1 = json_encode($request->post('sunday_1'));

        $appointment_calendar->all_monday_2 = $request->post('all_monday_2');
        $appointment_calendar->monday_2 = json_encode($request->post('monday_2'));

        $appointment_calendar->all_tuesday_2 = $request->post('all_tuesday_2');
        $appointment_calendar->tuesday_2 = json_encode($request->post('tuesday_2'));

        $appointment_calendar->all_wednesday_2 = $request->post('all_wednesday_2');
        $appointment_calendar->wednesday_2 = json_encode($request->post('wednesday_2'));

        $appointment_calendar->all_thursday_2 = $request->post('all_thursday_2');
        $appointment_calendar->thursday_2 = json_encode($request->post('thursday_2'));

        $appointment_calendar->all_friday_2 = $request->post('all_friday_2');
        $appointment_calendar->friday_2 = json_encode($request->post('friday_2'));

        $appointment_calendar->all_saturday_2 = $request->post('all_saturday_2');
        $appointment_calendar->saturday_2 = json_encode($request->post('saturday_2'));

        $appointment_calendar->all_sunday_2 = $request->post('all_sunday_2');
        $appointment_calendar->sunday_2 = json_encode($request->post('sunday_2'));

        $appointment_calendar->save();

        return redirect(url('admin/appointment-settings/edit'));
    }
}
