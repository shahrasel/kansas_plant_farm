<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContact() {
        return view('contact.contactus');
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

        dd($data);

    }
}
