<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContact() {

        $settings_info = Setting::select('address','email','phone','nursery_hours','pricing_sheet_link','order_form_link','nursery_link')->first();

        //return view('contact.contactus');
        return view('contact.contactus', [
            'settings_info' => $settings_info
        ]);
    }

    public function sendMessage(Request $request) {
        $data = $request->validate([
            'name'=>['required'],
            'street_address'=>['required'],
            'city'=>['required'],
            'state'=>['required'],
            'zip'=>['required'],
            'email'=>['required', 'email'],
            'phone'=>['required'],
            'comment'=>[],
            'plant_req'=>[],
            'checklist'=>[],
        ]);

        //dd($data);

    }
}
