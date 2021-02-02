<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSuppliers extends Model
{
    use HasFactory;
    protected $table = 'product__suppliers';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id','product_id','supplier_id'
    ];

    //
    public function Product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    //
    public function Suppliers()
    {
        return $this->belongsTo('App\Models\Suppliers');
    }
}
