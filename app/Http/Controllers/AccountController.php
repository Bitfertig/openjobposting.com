<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        return view('pages.account.index', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function edit_password(Request $request)
    {
        $user = auth()->user();
        return view('pages.account.edit_password', [
            'user' => $user,
        ]);
    }

    public function update_password(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'required|min:6|same:new_password_confirmation',
            'new_password_confirmation' => 'required|min:6',
        ]);

        if ( $request->password == $user->password ) {
            $validator->errors()->add('password', 'New Password cannot be same as your current password. Please choose a different password.');
        }

        if ( !Hash::check($request->password, $user->password) ) {
            $validator->errors()->add('password', 'Your current password does not matches with the password you provided. Please try again.');
        }

        if ( $validator->fails() ) {
            return redirect()->back()->withErrors($validator);
        }

        $user->fill([
            'password' => Hash::make($request->new_password)
        ]);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully!');
    }

}
