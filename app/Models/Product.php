<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id','category_id','product_name','product_quality','product_price',
        'product_image','product_discribe','product_discount','product_unitprice','product_tax'
    ];

    //Sản phẩm thuộc loại
    public function Categories()
    {
        return $this->belongsTo('App\Models\Categories');
    }

    //Sản phẩm có nhiều chi tiêt hóa đơn
    public function OrderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }

    //
    public function ProductSuppliers()
    {
        return $this->hasMany('App\Models\ProductSuppliers');
    }

    //Một sản phẩm có nhiều đánh giá
    public function RatingStar()
    {
        return $this->hasMany('App\Models\RatingStar');
    }

    //Một sản phẩm có trong nhiều giỏ hàng
    public function ShoppingCart()
    {
        return $this->hasMany('App\Models\ShoppingCart');
    }

    //Sản phẩm thuộc slider
    public function Slider()
    {
        return $this->hasOne('App\Models\Slider');
    }
}
