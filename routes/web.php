<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'showLanding']);

//login and regist
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('adptmadm', [AuthController::class, 'showFormLoginAdmin'])->name('adptmadm');
Route::post('adptmadm', [AuthController::class, 'loginAdmin']);

//middleware
Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('homeadmin', [PagesController::class, 'showAdminHome'])->name('homeadmin');
        Route::get('logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');
        //admin
        Route::get('viewadmin', [AdminController::class, 'index'])->name('viewadmin');
        Route::get('admprofile', [AdminController::class, 'edit'])->name('admprofile');
        Route::put('updateprofileadmin', [AdminController::class, 'update'])->name('updateprofileadmin');
        //user
        Route::get('viewuser', [UserController::class, 'index'])->name('viewuser');
        //article
        Route::get('viewarticle', [ArticleController::class, 'index'])->name('viewarticle');
        Route::get('postarticle', [ArticleController::class, 'create'])->name('postarticle');
        //product
        Route::get('viewproduct', [ProductController::class, 'index'])->name('viewproduct');
        Route::get('postproduct', [ProductController::class, 'create'])->name('postproduct');
        //pet
        Route::get('viewpet', [PetController::class, 'index'])->name('viewpet');
        //review
        Route::get('viewreview', [ReviewController::class, 'index'])->name('viewreview');
        //regist
        Route::get('pgfradmonly', [AuthController::class, 'showFormRegisterAdmin'])->name('pgfradmonly');
        Route::post('pgfradmonly', [AuthController::class, 'registerAdmin']);
        //cart
        Route::get('viewcart', [CartController::class, 'adminindex'])->name('viewcart');
        Route::delete('deleteCart/{id}', [CartController::class, 'deleteCart'])->name('deleteCart');
        Route::get('showcart/{id}', [CartController::class, 'showCart'])->name('showcart');
        //transaction
        Route::get('viewtransaction', [CartController::class, 'transactionindex'])->name('viewtransaction');
        Route::delete('deleteTransaction/{id}', [CartController::class, 'deleteTransaction'])->name('deleteTransaction');
        Route::get('showtransaction/{id}', [CartController::class, 'showTransaction'])->name('showtransaction');
        //CRUD
        Route::resource('admin', AdminController::class);
        Route::resource('user', UserController::class);
        Route::resource('article', ArticleController::class);
        Route::resource('product', ProductController::class);
        Route::resource('pet', PetController::class);
        Route::resource('review', ReviewController::class);
    }); 
    Route::middleware(['user'])->group(function () {
        Route::get('home', [PagesController::class, 'showHome'])->name('home');
        Route::get('editprofile', [UserController::class, 'edit'])->name('editprofile');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('postreview',[ReviewController::class, 'create'])->name('review');
        //user
        Route::get('editprofile', [UserController::class, 'edit'])->name('editprofile');
        Route::put('updateprofileuser', [UserController::class, 'update'])->name('updateprofileuser');
        //article
        Route::get('getarticle', [PagesController::class, 'showArticle'])->name('getarticle');
        //adopt
        Route::get('adopt', [PagesController::class, 'showAdopt'])->name('adopt');
        Route::get('adoptNow', [PagesController::class, 'adoptNow'])->name('adoptNow');
        Route::get('adoptDetails/{id}', [PagesController::class, 'showAdoptDetails'])->name('adoptDetails');
        Route::post('storepet', [PetController::class, 'store'])->name('storepet');
        Route::get('postpet', [PetController::class, 'create'])->name('postpet');
        //shop
        Route::get('shop', [PagesController::class, 'showShop'])->name('shop');
        Route::get('shopDetails/{id}', [PagesController::class, 'showShopDetails'])->name('shopDetails');
        //review
        Route::get('postreview/{id}', [ReviewController::class, 'create'])->name('postreview');
        Route::get('userreview/{id}', [ReviewController::class, 'userreview'])->name('userreview');
        Route::post('storereview', [ReviewController::class, 'store'])->name('storereview');
        //transaction
        Route::resource('cart', CartController::class);
        Route::patch('cart/{id}', [CartController::class, 'kosongkan'])->name('kosongkan');
        Route::resource('cartdetail', CartDetailController::class);
        Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
        Route::post('placeorder', [CartController::class, 'placeorder'])->name('placeorder');
        Route::get('confirmpayment', [CartController::class, 'viewconfirm'])->name('confirmpayment');
        Route::post('confirm', [CartController::class, 'confirm'])->name('confirm');
    }); 
});