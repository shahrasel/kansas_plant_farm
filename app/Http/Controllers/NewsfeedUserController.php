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
        //
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

        if($is_inserted) {

        }
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
    public function destroy(NewsfeedUser $newsfeedUser)
    {
        //
    }

    private function validation(Request $request) {
        $rules = [
            'name'=>'required|max:50',
            'email'=>'required|unique:newsfeed_users|email|max:100'
        ];

        $customMessages = [
            'email.unique' => 'User with this :attribute is already exists in our list'
        ];

        return $this->validate($request, $rules, $customMessages);


    }

}
