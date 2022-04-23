<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\pet;
use Auth;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $pet = pet::all();
        return view('pet.index', ['pet' => $pet], compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('pet.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Pet_Name' => 'required',
            'Pet_Street' => 'required',
            'Pet_Districts' => 'required',
            'Pet_Postcode' => 'required',
            'Pet_City' => 'required',
            'Pet_Country' => 'required',
            'Pet_Fee' => 'required',
            'Pet_Category' => 'required',
            'Pet_Type' => 'required',
            'Pet_Age' => 'required',
            'Pet_Photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Pet_Description' => 'required'
        ]);

        $image = $request->file('Pet_Photo');
        $imageName = time().'.'.$request->Pet_Photo->extension();
        $path = $image->storeAs('uploads', $imageName, 'public');


        pet::create([
            'PetID' => $request->PetID,
            'Pet_Name' => $request->Pet_Name,
            'Pet_Street' => $request->Pet_Street,
            'Pet_Districts' => $request->Pet_Districts,
            'Pet_Postcode' => $request->Pet_Postcode,
            'Pet_City' => $request->Pet_City,
            'Pet_Country' => $request->Pet_Country,
            'Pet_Fee' => $request->Pet_Fee,
            'Pet_Category' => $request->Pet_Category,
            'Pet_Type' => $request->Pet_Type,
            'Pet_Age' => $request->Pet_Age,
            'Pet_Photo' => $request->Pet_Photo='/storage/'.$path,
            'Pet_Description' => $request->Pet_Description
        ]);

        return redirect('/home')->with('status', 'Operation Succesful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(pet $pet)
    {
        $user = Auth::user();
        return view('pet.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(pet $pet)
    {
        $user = Auth::user();
        return view('pet.edit',compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pet $pet)
    {
        $validated = $request->validate([
            'Pet_Name' => 'required',
            'Pet_Street' => 'required',
            'Pet_Districts' => 'required',
            'Pet_Postcode' => 'required',
            'Pet_City' => 'required',
            'Pet_Country' => 'required',
            'Pet_Fee' => 'required',
            'Pet_Category' => 'required',
            'Pet_Type' => 'required',
            'Pet_Age' => 'required',
            'Pet_Description' => 'required'
        ]);

        if($request->hasFile('Pet_Photo')){
            $request->validate([
                'Pet_Photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image = $request->file('Pet_Photo');
            $imageName = time().'.'.$request->Pet_Photo->extension();
            $path = $image->storeAs('uploads', $imageName, 'public');
            $pet->Pet_Photo = $request->Pet_Photo = '/storage/'.$path;
        }
    
            $pet->Pet_Name = $request->Pet_Name;
            $pet->Pet_Street = $request->Pet_Street;
            $pet->Pet_Districts = $request->Pet_Districts;
            $pet->Pet_Postcode = $request->Pet_Postcode;
            $pet->Pet_City = $request->Pet_City;
            $pet->Pet_Country = $request->Pet_Country;
            $pet->Pet_Fee = $request->Pet_Fee;
            $pet->Pet_Category = $request->Pet_Category;
            $pet->Pet_Type = $request->Pet_Type;
            $pet->Pet_Age = $request->Pet_Age;
            $pet->Pet_Description = $request->Pet_Description;
            $pet->save();
    
            return redirect('/viewpet')->with('success','Pet updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pet $pet)
    {
        $pet->delete();

        return redirect('/viewpet')->with('status', 'Pet deleted succesfully!');
    }
}
