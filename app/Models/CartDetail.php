<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = 'cart_detail';
    protected $fillable = [
        'cart_id',
        'product_id',
        'qty',
        'harga',
        'subtotal',
        'created_at',
        'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'IDCartDetail';

    public function cart(){
        return $this->belongsTo(Cart::class, 'cart_id', 'IDCart');
    }

    public function product(){
        return $this->belongsTo(product::class, 'product_id', 'IDProduct');
    }

    public function updatedetail($itemdetail, $qty, $harga) {
        $this->attributes['qty'] = $itemdetail->qty + $qty;
        $this->attributes['subtotal'] = $itemdetail->subtotal + ($qty * $harga);
        self::save();
    }
}