<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\CartDetail;
use \App\Models\Cart;
use \App\Models\product;
use Auth;


class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        return abort('404');
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
        $itemuser  = Auth::user()->IDUser;
        $itemproduk = product::findOrFail($request->IDProduct);
        $cart = Cart::where('user_id', $itemuser)
                    ->where('status_cart', 'cart')
                    ->first();
        $checkout = Cart::where('user_id', $itemuser)
                    ->where('status_cart', 'checkout')
                    ->where('status_pembayaran', 'belum')
                    ->first();
        
        if($checkout){
           return view('cart.payfirst');
        }
        else{
        if($cart){
            $itemcart = $cart;
        } else{
            $no_invoice = Cart::where('user_id', $itemuser)->count();
            $inputancart['user_id'] = $itemuser;
            $inputancart['no_invoice'] = 'INV '.str_pad(($no_invoice + 1),'3', '0', STR_PAD_LEFT);
            $inputancart['status_cart'] = 'cart';
            $inputancart['status_pembayaran'] = 'belum';
            $inputancart['status_pengiriman'] = 'belum';
            $itemcart = Cart::create($inputancart);
        }

        $data = CartDetail::where('cart_id', $itemcart->IDCart)
                            ->where('product_id', $request->IDProduct)
                            ->first();
        $qty = 1;
        $harga = $itemproduk->Product_Price;
        $subtotal = $qty * $harga;

        if($data){
            $data->updatedetail($data, $qty, $harga);
            $data->cart->updatetotal($data->cart, $subtotal);
        } else{
            $inputan = $request->all();
            $inputan['cart_id'] = $itemcart->IDCart;
            $inputan['product_id'] = $request->IDProduct;
            $inputan['qty'] = $qty;
            $inputan['harga'] = $harga;
            $inputan['subtotal'] = $harga * $qty;
            $itemdetail = CartDetail::create($inputan);    
            $itemdetail->cart->updatetotal($itemdetail->cart, $subtotal);
        }

        return redirect('/cart')->with('success', 'Product added to cart successfully!');
    }
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
        $itemdetail = CartDetail::findOrFail($id);
        $param = $request->param;
        
        if ($param == 'tambah') {
            // update detail cart
            $qty = 1;
            $itemdetail->updatedetail($itemdetail, $qty, $itemdetail->harga);
            // update total cart
            $itemdetail->cart->updatetotal($itemdetail->cart, $itemdetail->harga);
            return back()->with('success', 'Item berhasil diupdate');
        }
        if ($param == 'kurang') {
            // update detail cart
            $qty = 1;
            $qtynow = $itemdetail->qty - $qty;
            if ($qtynow <= 0){
                return redirect('/cart')->with('success', 'Item quantity shouldnt be zero/under! Remove it if you want to!');
            }
            else{
            $itemdetail->updatedetail($itemdetail, '-'.$qty, $itemdetail->harga);
            // update total cart
            $itemdetail->cart->updatetotal($itemdetail->cart, '-'.$itemdetail->harga);
            return redirect('/cart')->with('success', 'Item succesfully updated');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemdetail = CartDetail::findOrFail($id);
        // update total cart dulu
        $itemdetail->cart->updatetotal($itemdetail->cart, '-'.$itemdetail->subtotal);
        if ($itemdetail->delete()) {
            return redirect('/cart')->with('success', 'Item sucessfully deleted');
        } else {
            return redirect('/cart')->with('error', 'Failed');
        }
    }
}
