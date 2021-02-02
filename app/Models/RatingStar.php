<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingStar extends Model
{
    use HasFactory;
    protected $table = 'ratingstars';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id','user_id','product_id','avg_number_star'
    ];

    //Nhiều đánh giá thuộc về một tài khoản
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
