<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $User = User::where('role', '=', 'u')->get();
        return view('user.index', ['User' => $User], compact('user'));
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
        $user = Auth::user();
        $User= User::where('IDUser', $id)->first();
        return view('user.show', ['User' => $User], compact ('User'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $id=Auth::user()->IDUser;
        $User= User::where('IDUser', $id)->first();
        return view('user.edit', ['User' => $User], compact ('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $id=Auth::user()->IDUser;
        $User= User::where('IDUser', $id)->first();

        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'fname' => 'required',
            'lname' => 'required',
        ]);
        
        if($request->hasFile('User_Photo')){
            $request->validate([
                'User_Photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image = $request->file('User_Photo');
            $imageName = time().'.'.$request->User_Photo->extension();
            $path = $image->storeAs('uploads', $imageName, 'public');
            $User->User_Photo = $request->User_Photo='/storage/'.$path;
        }

            $User->username = $request->username;
            $User->fname = $request->fname;
            $User->lname = $request->lname;
            $User->email = $request->email;
            $User->Phone_Number = $request->Phone_Number;
            $User->Loc_Street = $request->Loc_Street;
            $User->Loc_Districts = $request->Loc_Districts;
            $User->Loc_Postcode = $request->Loc_Postcode;
            $User->Loc_City = $request->Loc_City;
            $User->Loc_Country = $request->Loc_Country;
            $User->save();
    
            return redirect('/editprofile')->with('success','Product updated successfully!');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        $User= User::where('IDUser', $id)->first();
        $User->delete();        
        return redirect('/viewuser')->with('success','Admin deleted successfully!');
    }
}
