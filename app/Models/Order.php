<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id','user_id','order_status','order_amount'
    ];

    //Hóa đơn thuộc tài khoản
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Một hóa đơn có nhiều chi tiết
    public function OrderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
}
