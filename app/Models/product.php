<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    protected $fillable = ['Product_Name', 'Product_Category', 'Product_Price', 'Product_Stock', 'Product_Weight', 'Product_Expired', 'Product_Image', 'Product_Description'];
    public $timestamps = false;
    protected $primaryKey = 'IDProduct';
}
