<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Rules\CurrentPasswordVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function dashboard() {

        return view('user.dashboard');
    }

    public function orders() {

        return view('user.orders');
    }

    public function profile() {

        return view('user.profile');
    }

    public function update(Request $request) {

        if(!empty($request->input('id'))) {
            /*$hasher = app('hash');
            $user = User::find($request->input('id'));

            echo $request->input('current_password').'###'.$user->password;

            if ($hasher->check($request->input('current_password'), $user->password)) {
                echo 'ddd';
            }
            exit;*/

            $this->validate($request, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$request->input('id'),
                'phone' => 'nullable|regex:/(01)[0-9]{9}/',
                'company' => 'nullable|string|max:100',
                'address1' => 'nullable|string|max:100',
                'address2' => 'nullable|string|max:100',
                'city' => 'nullable|string|max:50',
                'state' => 'nullable|string|max:50',
                ///'zip' => 'nullable|numeric|max:5',
                'new_password' => 'nullable|min:8|required_with:confirm_password|same:confirm_password',
                'current_password' => ['nullable', 'min:8', new CurrentPasswordVerification(auth()->user())],
            ]);

            $user = User::find($request->input('id'));
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');

            if(!empty($request->input('new_password'))) {
                $user->password = Hash::make($request->input('new_password'));
            }

            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip = $request->input('zip');

            $user->save();

            return redirect()->route('my-profile');

        }
    }

    ///                      ///
    ///                      ///
    /// code for admin panel ///
    ///                      ///
    ///                      ///
    public function adminLogin(Request $request) {
        if($request->has('email') && $request->has('password')) {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if (\Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'usertype' => 'superadmin']
                )
            ){
                return redirect('/admin/dashboard');
            }
            else {
                return view('admin.user.login');
            }
            //return redirect('/')->with('error', 'Invalid Email address or Password');
        }
        else {
            return view('admin.user.login');
        }
    }

    public function adminLogout(Request $request)
    {
        if(\Auth::check())
        {
            \Auth::logout();
            $request->session()->invalidate();
        }
        return  redirect('/admin');
    }

    public function adminDashboard(Request $request) {
        return view('admin.user.dashboard');
    }

    public function adminContractors() {
        $where_query= array();
        $where_query['usertype'] = 'contractor';

        $contractor_lists = DB::table('users')
            ->where($where_query)
            ->orderBy('id', 'desc')->get();

        return view('admin.user.allContractors', [
            'contractor_lists' => $contractor_lists
        ]);
    }

    public function adminCustomers() {
        $where_query= array();
        $where_query['usertype'] = 'buyer';

        $customer_lists = DB::table('users')
            ->where($where_query)
            ->orderBy('id', 'desc')->get();

        return view('admin.user.allCustomers', [
            'customer_lists' => $customer_lists
        ]);
    }

    public function adminMyProfile(Request $request) {
        if($request->has('email') && $request->has('password')) {
            $this->validate($request, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$request->input('id'),
                'phone' => 'nullable|regex:/(01)[0-9]{9}/',
                'company' => 'nullable|string|max:100',
                'address1' => 'nullable|string|max:100',
                'address2' => 'nullable|string|max:100',
                'city' => 'nullable|string|max:50',
                'state' => 'nullable|string|max:50',
                //'zip' => 'nullable|numeric|max:5',
                'password' => 'nullable|min:8|required_with:confirm_password|same:confirm_password',
            ]);

            //dd($user);

            $user = User::find($request->input('id'));
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            //$user->usertype = 'contractor';

            if(!empty($request->input('password'))) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip = $request->input('zip');

            $user->save();

            //return redirect('/admin/contractors');
        }

        return view('admin.user.myProfile');
        /*return view('admin.user.myProfile', [
            'customer_lists' => $customer_lists
        ]);*/
    }

    public function addAdminContractor(Request $request) {
        if($request->has('email') && $request->has('password')) {
            $this->validate($request, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$request->input('id'),
                'phone' => 'nullable|regex:/(01)[0-9]{9}/',
                'company' => 'nullable|string|max:100',
                'address1' => 'nullable|string|max:100',
                'address2' => 'nullable|string|max:100',
                'city' => 'nullable|string|max:50',
                'state' => 'nullable|string|max:50',
                //'zip' => 'nullable|numeric|max:5',
                'password' => 'min:8|required_with:confirm_password|same:confirm_password',
            ]);

            //dd($user);

            //$user = User::find($request->input('id'));
            $user = new User();
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->usertype = 'contractor';

            $user->password = Hash::make($request->input('password'));

            $user->phone = $request->input('phone');
            $user->company_name = $request->input('company');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip = $request->input('zip');

            $user->save();

            return redirect('/admin/contractors');
        }

        return view('admin.user.addContractor');
    }
}
