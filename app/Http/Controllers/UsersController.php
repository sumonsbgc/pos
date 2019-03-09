<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=User::all();
        return view('all_users',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('create_user');

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
        $newData=$request->all();
        $updateData=user::findOrfail($id);
        $updateData->update($newData);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData=user::findOrfail($id);
        $deleteData->delete($deleteData);
        return back();
    }

    public function user_profile(){

        return view('edit_profile');

    }

    public function update_password(Request $request){

        $password = Hash::make($request->password);

        Auth::user()->password = $password;

        Auth::user()->save();

        return back();
    }

    public function user_update(Request $request){

        Auth::user()->name = $request->name;
        Auth::user()->username = $request->username;
        Auth::user()->present_add = $request->present_add;
        Auth::user()->permanent_add = $request->permanent_add;
        Auth::user()->mobile_no = $request->mobile_no;
        Auth::user()->nid_no = $request->nid_no;
        Auth::user()->birth_certificate_no = $request->birth_certificate_no;

        Auth::user()->save();
        return back();

    }
}
