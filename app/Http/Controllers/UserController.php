<?php

namespace App\Http\Controllers;


use App\Mail\consumerRegistration;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Rules\CurrentPasswordVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    //
    public function dashboard() {

        return view('user.dashboard');
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
                'phone' => 'nullable',
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

            //Auth::setUser($user);


            return redirect()->route('my-profile');

        }
    }


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
        $where_query= array();
        $where_query['status'] = 'Payment Completed';

        $new_order_lists = DB::table('orders')
            ->where('status', 'Payment Completed')
            ->orderBy('id', 'desc')->get();

        $completed_order_lists = DB::table('orders')
            ->where('status', 'Customer Picked Up')
            ->orderBy('id', 'desc')->get();

        return view('admin.user.dashboard', [
            'new_order_lists' => $new_order_lists,
            'completed_order_lists' => $completed_order_lists
        ]);
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
        if($request->has('email')) {

            $this->validate($request, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$request->input('id'),
                'phone' => 'nullable',
                'company' => 'nullable|string|max:100',
                'address1' => 'nullable|string|max:100',
                'address2' => 'nullable|string|max:100',
                'city' => 'nullable|string|max:50',
                'state' => 'nullable|string|max:50',
                //'zip' => 'nullable|numeric|max:5',
                'password' => 'nullable|min:8|required_with:confirm_password|same:confirm_password',
            ]);

            //dd($user);

            if(!empty($request->file('pimage'))) {
                $path = $request->file('pimage');

                $filename = $path->getClientOriginalName();

                $thumb_image_resize = Image::make($path->getRealPath());

                $thumb_image_resize->resize(250, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $thumb_image_resize->save(public_path('img/users/' . $filename));
            }


            $user = User::find($request->input('id'));

            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            //$user->usertype = 'contractor';

            if(!empty($request->input('password'))) {
                $user->password = Hash::make($request->input('password'));
            }

            if(!empty($request->file('pimage'))) {
                $user->pimage = $filename;
            }

            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip = $request->input('zip');

            $user->save();

            //$user = User::find($request->input('id'));
            //dd($user);
            Auth::setUser($user);
            //Auth::user($user);

            //return redirect()->route('admin-my-profile');

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
                'phone' => 'nullable',
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

    public function adminSales() {
        $where_query= array();
        $where_query['usertype'] = 'sales';

        $sale_lists = DB::table('users')
            ->where($where_query)
            ->orderBy('id', 'desc')->get();

        return view('admin.user.allSales', [
            'sale_lists' => $sale_lists
        ]);
    }

    public function addAdminSales(Request $request) {
        if($request->has('email') && $request->has('password')) {
            $this->validate($request, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$request->input('id'),
                'phone' => 'nullable',
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
            $user->usertype = 'sales';

            $user->password = Hash::make($request->input('password'));

            $user->phone = $request->input('phone');
            $user->company_name = $request->input('company');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip = $request->input('zip');

            $user->save();

            return redirect('/admin/sales');
        }

        return view('admin.user.addSale');
    }

    public function editAdminSales($id) {
        $sales_info = User::where('id',$id)->first();

        return view('admin.user.editSale',[
            'sales_info'=>$sales_info
        ]);
    }

    public function updateAdminSales(Request $request) {

        if($request->has('email')) {
            $this->validate($request, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$request->input('id'),
                'phone' => 'nullable',
                'company' => 'nullable|string|max:100',
                'address1' => 'nullable|string|max:100',
                'address2' => 'nullable|string|max:100',
                'city' => 'nullable|string|max:50',
                'state' => 'nullable|string|max:50',
                'zip' => 'nullable|numeric',
                'password' => 'nullable|min:8|required_with:confirm_password|same:confirm_password',
                'confirm_password' => ['nullable', 'min:8'],
            ]);

            //dd($request->all());

            $user = User::find($request->input('id'));
            //$user = new User();
            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->usertype = 'sales';

            if(!empty($request->input('password')))
                $user->password = Hash::make($request->input('password'));

            $user->phone = $request->input('phone');
            $user->company_name = $request->input('company');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->zip = $request->input('zip');

            $user->save();

            return redirect('/admin/sales');
        }

        return view('admin.user.addSale');
    }

    public function adminDeleteUser($id) {
        $user = User::find($id);
        //dd($product);
        $user->delete();

        return redirect(url('admin/customers'));
    }
}
