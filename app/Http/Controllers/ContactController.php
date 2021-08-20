<?php

namespace App\Http\Controllers;

use App\Mail\checkoutConfirmation;
use App\Mail\contactEmail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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



        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->get('recaptcha'),
            'remoteip' => $remoteip
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        //dd($resultJson);

        if ($resultJson->success != true) {
            return back()->withErrors(['captcha' => 'ReCaptcha Error']);
        }
        if ($resultJson->score >= 0.3) {
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



            Mail::to('shahrasel@gmail.com')
                ->send(new contactEmail($request->name,$request->street_address,$request->city,$request->state,$request->zip,$request->email,$request->phone,$request->comment,$request->plant_req,$request->checklist));

            echo 'done';
            exit;
            //return back()->with('message', 'Thanks for your message!');

        } else {
            return back()->withErrors(['captcha' => 'ReCaptcha Error']);
        }


        //dd($data);

    }
}
