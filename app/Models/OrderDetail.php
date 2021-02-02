<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id','order_id','product_id','total_quality','total_price'
    ];

    //Chi tiết hóa đơn thuộc hóa đơn
    public function Order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    //Chi tiết hóa đơn thuộc sản phẩm
    public function Product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
