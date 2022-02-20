<?php

namespace App\Http\Controllers;

use App\Models\NewsfeedUser;
use Illuminate\Http\Request;

class NewsfeedUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.newsfeed_users.index',[
           'users_email_lists' => NewsfeedUser::orderByDesc('id','desc')->paginate(100)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(($data));
        $this->validation($request);


        $newsfeedUser = new NewsfeedUser();

        $newsfeedUser->name = $request->post('name');
        $newsfeedUser->email = $request->post('email');

        $is_inserted = $newsfeedUser->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsfeedUser  $newsfeedUser
     * @return \Illuminate\Http\Response
     */
    public function show(NewsfeedUser $newsfeedUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsfeedUser  $newsfeedUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsfeedUser $newsfeedUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsfeedUser  $newsfeedUser
     * @return \Illuminate\Http\Responseequest->valida
     */
    public function destroy($id)
    {
        NewsfeedUser::destroy($id);

        return redirect(url('admin/newsfeed-users'));
    }

    private function validation(Request $request) {
        $rules = [
            'email'=>'required|unique:newsfeed_users|email|max:100'
        ];

        $customMessages = [
            'email.unique' => 'User with this :attribute is already exists in our list'
        ];

        return $this->validate($request, $rules, $customMessages);


    }

    public function exportcsv(Request $request)
    {
        //dd($request);
        $fileName = 'newsfeed_users_'.date('m_d_Y').'.csv';
        $tasks = NewsfeedUser::select('email')->orderByDesc('id')->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('email');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['email']  = $task->email;

                fputcsv($file, array($row['email']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

}
