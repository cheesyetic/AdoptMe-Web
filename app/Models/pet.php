<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pet extends Model
{
    protected $table = 'pet';
    protected $fillable = ['Pet_Name', 'Pet_Street', 'Pet_Districts', 'Pet_Postcode', 'Pet_City', 'Pet_Country', 'Pet_Fee', 'Pet_Category', 'Pet_Type', 'Pet_Age', 'Pet_Photo', 'Pet_Description'];
    public $timestamps = false;
    protected $primaryKey = 'PetID';
}
