<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\review;
use \App\Models\product;
use Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //$article = DB::table('article')->get();
        $review = review::all();
        return view('review.index', ['review' => $review]);
    }

    public function userreview($id)
    {
        $user = Auth::user();
        $product = product::where('IDProduct', $id)->first();
        $review = review::where('product_id', $id)->get();
        return view('review.userindex', ['review'=>$review], ['product'=>$product], compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = Auth::user();
        $product = product::where('IDProduct', $id)->first();
        return view('review.create', ['product'=>$product], compact('user'));
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
            'Rating' => 'required',
            'Comments' => 'required',
            'Image_Review' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('Image_Review');
        $imageName = time().'.'.$request->Image_Review->extension();
        $path = $image->storeAs('uploads', $imageName, 'public');
        $id = Auth::user()->IDUser;

        review::create([
            'user_id' => $id,
            'product_id' => $request->IDProduct,
            'Rating' => $request->Rating,
            'Comments' => $request->Comments,
            'Image_Review' => $request->Image_Review = '/storage/'.$path
        ]);

        return redirect('/shop')->with('success', 'Review Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(review $review)
    {
        return view('review.show', compact ('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(review $review)
    {
        return view('review.edit', compact ('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, review $review)
    {
        $validated = $request->validate([
            'Rating' => 'required',
            'Comments' => 'required'
        ]);

        if($request->hasFile('Image_Review')){
            $request->validate([
                'Image_Review' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image = $request->file('Image_Review');
            $imageName = time().'.'.$request->Image_Review->extension();
            $path = $image->storeAs('uploads', $imageName, 'public');
            $review->Image_REview = $request->Image_Review='/storage/'.$path;
        }
    
            $review->Rating = $request->Rating;
            $review->Comments = $request->Comments;
            $review->save();
    
            return redirect('/viewreview')->with('success','Review updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(review $review)
    {
        $review->delete();
        
        return redirect('/viewreview')->with('success','Review deleted successfully!');
    }
}
