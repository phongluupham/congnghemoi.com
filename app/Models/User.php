<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','role_id','fullname','username','password',
        'email','sex','birthday','phone','address','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    //Tài khoản thuộc quyền
    public function RoleAccess()
    {
        return $this->belongsTo('App\Models\RoleAccess');
    }
    //Một tài khoản có nhiều đánh giá
    public function RatingStar()
    {
        return $this->hasMany('App\Models\RatingStar');
    }

    //Một tài khoản có nhiều giỏ hàng
    public function ShoppingCart()
    {
        return $this->hasMany('App\Models\ShoppingCart');
    }

    //Một tài khoản có nhiều hóa đơn
    public function Order()
    {
        return $this->hasMany('App\Models\Order');
    }




}
