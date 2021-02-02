<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id','category_name','category_description','category_image'
    ];

    //Loại có nhiều sản phẩm
    public function Product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
