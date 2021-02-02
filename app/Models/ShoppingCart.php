<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $table = 'shopping_carts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id','user_id','product_id','quality'
    ];

    //Giỏ hàng thuộc tài khoản
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Giỏ hàng thuộc sản phẩm
    public function Product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
