<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\product;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //$product = DB::table('product')->get();
        $product = product::all();
        return view('product.index', ['product' => $product], compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('product.create', compact('user'));
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
            'Product_Name' => 'required',
            'Product_Price' => 'required',
            'Product_Category' => 'required',
            'Product_Stock' => 'required',
            'Product_Weight' => 'required',
            'Product_Expired' => 'required',
            'Product_Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Product_Description' => 'required'
        ]);

        $image = $request->file('Product_Image');
        $imageName = time().'.'.$request->Product_Image->extension();
        $path = $image->storeAs('uploads', $imageName, 'public');

        product::create([
            'IDProduct' => $request->IDProduct,
            'Product_Name' => $request->Product_Name,
            'Product_Price' => $request->Product_Price,
            'Product_Category' => $request->Product_Category,
            'Product_Stock' => $request->Product_Stock,
            'Product_Weight' => $request->Product_Weight,
            'Product_Expired' => $request->Product_Expired,
            'Product_Image' => $request->Product_Image='/storage/'.$path,
            'Product_Description' => $request->Product_Description
        ]);

        return redirect('/viewproduct')->with('status', 'Product added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view('product.show', compact ('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('product.edit', compact ('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $validated = $request->validate([
            'Product_Name' => 'required',
            'Product_Price' => 'required',
            'Product_Category' => 'required',
            'Product_Stock' => 'required',
            'Product_Weight' => 'required',
            'Product_Expired' => 'required',
            'Product_Description' => 'required'
        ]);
        
        if($request->hasFile('Product_Image')){
            $request->validate([
                'Product_Image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image = $request->file('Product_Image');
            $imageName = time().'.'.$request->Product_Image->extension();
            $path = $image->storeAs('uploads', $imageName, 'public');
            $product->Product_Image = $request->Product_Image='/storage/'.$path;
        }

            $product->Product_Name = $request->Product_Name;
            $product->Product_Price = $request->Product_Price;
            $product->Product_Category = $request->Product_Category;
            $product->Product_Stock = $request->Product_Stock;
            $product->Product_Weight = $request->Product_Weight;
            $product->Product_Expired = $request->Product_Expired;
            $product->Product_Description = $request->Product_Description;
            $product->save();
    
            return redirect('/viewproduct')->with('success','Product updated successfully!');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        
        return redirect('/viewproduct')->with('success','Product deleted successfully!');
    }
}
