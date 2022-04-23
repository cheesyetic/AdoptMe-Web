<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Cart;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', Auth::user()->IDUser)
                    ->where('status_cart', 'cart')
                    ->first();
        $checkout = Cart::where('user_id', Auth::user()->IDUser)
                        ->where('status_cart', 'checkout')
                        ->where('status_pembayaran', 'belum')
                        ->first();
        if($carts){
            return view('cart.index', ['carts' => $carts], compact('user'));
        } 
        if($checkout){
            return view('cart.payfirst', compact('user'));
        }else{
            return view('cart.empty', compact('user'));
        }
    }

    public function kosongkan($id)
    {
        $itemcart = Cart::findOrFail($id);
        $itemcart->detail()->delete();//hapus semua item di cart detail
        $itemcart->updatetotal($itemcart, '-'.$itemcart->subtotal);
        return redirect('/cart')->with('success', 'Cart berhasil dikosongkan');
    }

    public function checkout()
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', Auth::user()->IDUser)
                    ->where('status_cart', 'cart')
                    ->first();
        return view('cart.checkout', ['carts' => $carts], compact('user'));
    }

    public function placeorder(Request $request)
    
    {
        $user = Auth::user();
        $itemcart = Cart::where('user_id', Auth::user()->IDUser)
                    ->where('status_cart', 'cart')
                    ->first();
        $itemcart->ekspedisi = $request->shipping_value;
        $itemcart->status_cart = 'checkout';
        $itemcart->save();
        return view('user.home', compact('user'));
    }

    public function viewconfirm()
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', Auth::user()->IDUser)
                    ->where('status_cart', 'checkout')
                    ->where('status_pembayaran', 'belum')
                    ->first();
        if($carts){
            return view('cart.payment', ['carts' => $carts], compact('user'));
        }
        else{
            return view('cart.zeropayment', compact('user'));
        }
     }

     public function confirm(Request $request)
     {
         $user = Auth::user();
         $carts = Cart::where('user_id', Auth::user()->IDUser)
                     ->where('status_cart', 'checkout')
                     ->where('status_pembayaran', 'belum')
                     ->first();

        $validated = $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('bukti_pembayaran');
        $imageName = time().'.'.$request->bukti_pembayaran->extension();
        $path = $image->storeAs('uploads', $imageName, 'public');
        $carts->status_pembayaran = 'sudah';
        $carts->bukti_pembayaran = $request->bukti_pembayaran='/storage/'.$path;
        $carts->save();
        return view('user.home', compact('user'));
     }

     public function adminindex()
     {
         $user = Auth::user();
         $cart = Cart::where('status_pembayaran', 'belum')->get();
         return view('cart.adminindex', ['cart'=>$cart], compact('user'));
     }

     public function transactionindex()
     {
         $user = Auth::user();
         $cart = Cart::where('status_pembayaran', 'sudah')->get();
         return view('cart.transactionindex', ['cart'=>$cart], compact('user'));
     }

     public function deleteTransaction($id){
         $user = Auth::user();
         $itemcart = Cart::findOrFail($id);
         $itemcart->delete();
         return redirect('/viewtransaction')->with('success','Transaction deleted successfully!');
     }

     public function deleteCart($id){
        $user = Auth::user();
        $itemcart = Cart::findOrFail($id);
        $itemcart->delete();
        return redirect('/viewcart')->with('success','Cart deleted successfully!');
    }

    public function showCart($id){
        $user = Auth::user();
        $cart = Cart::where('IDCart', $id)->first();
        return view('cart.showcart', ['cart' => $cart], compact ('cart'));
    }

    public function showTransaction($id){
        $user = Auth::user();
        $cart = Cart::where('IDCart', $id)->first();
        return view('cart.showtransaction', ['cart' => $cart], compact ('cart'));
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
        $itemcart = Cart::findOrFail($id);
        $itemcart->delete();
        return view('cart.empty');
    }
}
