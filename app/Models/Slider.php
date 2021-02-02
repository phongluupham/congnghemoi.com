<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id','product_id','image_slider','title_slider'
    ];

    //Slider có nhiều sản phẩm
    public function Product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
