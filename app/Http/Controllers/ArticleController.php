<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\article;
use Auth;

class ArticleController extends Controller
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
        $article = article::all();
        return view('article.index', ['article' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('article.create',compact('user'));
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
            'Title' => 'required',
            'Description' => 'required',
            'Photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('Photo');
        $imageName = time().'.'.$request->Photo->extension();
        $path = $image->storeAs('uploads', $imageName, 'public');

        article::create([
            'IDArticle' => $request->IDArticle,
            'Title' => $request->Title,
            'Description' => $request->Description,
            'Photo' => $request->Photo = '/storage/'.$path
        ]);

        return redirect('/viewarticle')->with('status', 'Article added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {
        return view('article.show', compact ('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, article $article)
    {
        $validated = $request->validate([
            'Title' => 'required',
            'Description' => 'required'
        ]);

        if($request->hasFile('Photo')){
            $request->validate([
                'Photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $image = $request->file('Photo');
            $imageName = time().'.'.$request->Photo->extension();
            $path = $image->storeAs('uploads', $imageName, 'public');
            $article->Photo = $request->Photo='/storage/'.$path;
        }

        $article->Title = $request->Title;
        $article->Description = $request->Description;
        $article->save();

        return redirect('/viewarticle')->with('success','Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(article $article)
    {
        $article->delete();
        
        return redirect('/viewarticle')->with('success','Article deleted successfully!');
    }
}