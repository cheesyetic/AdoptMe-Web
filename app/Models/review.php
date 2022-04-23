<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = 'review';
    protected $fillable = ['user_id','product_id', 'Rating', 'Comments', 'Image_Review'];
    public $timestamps = true;
    protected $primaryKey = 'IDReview';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'IDUser');
    }
}
