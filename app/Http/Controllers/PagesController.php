<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use \App\Models\product;
use \App\Models\article;
use \App\Models\pet;
use Auth;

class PagesController extends Controller
{

    public function showLanding()
    {
        return view('welcome');
    }

    public function showHome()
    {
        $user = Auth::user();
        return view('user.home',compact('user'));
    }

    public function showUserProfile()
    {
        $user = Auth::user();
        return view('user.profile',compact('user'));
    }

    public function showAdminHome()
    {
        $user = Auth::user();
        return view('admin.home',compact('user'));
    }

    public function showShop()
    {
        $user = Auth::user();
        $product = product::all();
        return view('shop.index', ['product' => $product], compact('user'));
    }

    public function showShopDetails($id)
    {
        $user = Auth::user();
        $product = product::where('IDProduct', $id)->first();
        return view('shop.details', ['product' => $product], compact ('product'));
    }

    public function showAdoptDetails($id)
    {
        $user = Auth::user();
        $pet = pet::where('PetID', $id)->first();
        return view('adopt.details', ['pet' => $pet], compact ('pet'));
    }

    public function showAdopt()
    {
        $user = Auth::user();
        $pet = pet::all();
        return view('adopt.index', ['pet' => $pet], compact('user'));
    }

    public function adoptNow()
    {
        $user = Auth::user();
        return redirect()->away("https://wa.me/6281585667441");
    }

    public function showArticle()
    {
        $user = Auth::user();
        $article = article::all();
        return view('article.userindex', ['article' => $article], compact('user'));
    }

}
