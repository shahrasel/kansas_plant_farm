<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Mail\checkoutConfirmation;
use App\Mail\consumerRegistration;
use App\Mail\inquireEmail;
use App\Mail\pickupConfirmation;
use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use http\Client\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        /*$cart_lists = Cart::where('user_session_id','57amlBuIqedocH2gy5kxdNvQ105hVjiQvRyhtI1z')->get();


        Mail::to('shahrasel@gmail.com')
            ->send(new consumerRegistration($cart_lists));

        if (Mail::failures()) {
            return response()->json([
                'status'  => false,
                'message' => 'Nnot sending mail.. retry again...'
            ]);
        }
        return response()->json([
            'status'  => true,
            'message' => 'Your details mailed successfully'
        ]);

        die();*/



        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'alpha', 'max:255'],
            'lastname' => ['required', 'alpha', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        //dd($data);
        //get the IP address of the origin of the submission
        $ip = $_SERVER['REMOTE_ADDR'];

        $reCAPTCHA_secret_key = "6LeiKhEcAAAAADXtry3vGiYbPr9dMumEBz1ukRRL";
        $g_recaptcha_allowable_score = 0.8;


        $url =  'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($reCAPTCHA_secret_key) . '&response=' . urlencode($data['recaptcha']) . '&remoteip=' . urlencode($ip);

//save the response, e.g. print_r($response) prints { "success": true, "challenge_ts": "2019-07-24T11:19:07Z", "hostname": "your-website-domain.co.uk", "score": 0.9, "action": "contactForm" }
        $response = file_get_contents($url);

//decode the response, e.g. print_r($responseKeys) prints Array ( [success] => 1 [challenge_ts] => 2019-07-24T11:19:07Z [hostname] => your-website-domain.co.uk [score] => 0.9 [action] => contactForm )
        $responseKeys = json_decode($response, true);

//check if the test was done OK, if the action name is correct and if the score is above your chosen threshold (again, I've saved '$g_recaptcha_allowable_score' in config.php)
        //dd($responseKeys);
        if ($responseKeys["success"]) {
            if ($responseKeys["score"] >= $g_recaptcha_allowable_score) {
                //send email with contact form submission data to site owner/ submit to database/ etc
                //redirect to confirmation page or whatever you need to do

                $user = new User();
                $user->firstname = $data['firstname'];
                $user->lastname = $data['lastname'];
                $user->password = Hash::make($data['password']);
                $user->email = $data['email'];
                $user->phone = $data['phone'];
                $user->usertype = 'buyer';
                $user->save();

                Mail::to($data['email'])->send(new consumerRegistration($data['firstname']));

            }
            /*elseif ($responseKeys["score"] < $g_recaptcha_allowable_score) {
                //failed spam test. Offer the visitor the option to try again or use an alternative method of contact.
            }*/
        }
        /*elseif($responseKeys["error-codes"]) { //optional
            //handle errors. See notes below for possible error codes
            //personally I'm probably going to handle errors in much the same way by sending myself a the error code for debugging and offering the visitor the option to try again or use an alternative method of contact
        } else {
            //unkown screw up. Again, offer the visitor the option to try again or use an alternative method of contact.
        }*/







        return route('login');

    }

    /*public function register(Request $request) {
        dd($request->all());
        $user = new User();
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->password = Hash::make($request->get('password'));
        $user->email = $request->get('email');
        $user->save();

        //return redirect()->route('login');
        //return redirect($this->redirectPath())->with('message', 'Your message');
        //return route('login');
        //Auth::login($user);
        return route('login');
    }*/
}
