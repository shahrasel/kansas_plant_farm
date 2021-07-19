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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
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


        /*return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/
        /*Mail::to('shahrasel@gmail.com')
            ->send(new consumerRegistration($data['firstname']));
        die();*/

        $cart_lists = Cart::where('user_session_id','57amlBuIqedocH2gy5kxdNvQ105hVjiQvRyhtI1z')->get();


        Mail::to('shahrasel@gmail.com')
            ->send(new inquireEmail($data['firstname'],$cart_lists));
        die();

        $user = new User();
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user->usertype = 'buyer';
        $user->save();

        //return redirect()->route('login');
        //return redirect($this->redirectPath())->with('message', 'Your message');
        //return route('login');
        //Auth::login($user);



        return route('checkout');

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
