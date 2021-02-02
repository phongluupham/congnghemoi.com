<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id','supplier_name','supplier_image','supplier_address','supplier_discribe'
    ];

    public function ProductSuppliers()
    {
        return $this->hasMany('App\Models\ProductSuppliers');
    }

}
