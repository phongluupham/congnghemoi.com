<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAccess extends Model
{
    use HasFactory;
    protected $table = 'roll_acesses';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id','role_name','role_discribe'
    ];

    //Một loại quyền có nhiều người dùng
    public function User()
    {
        return $this->hasMany('App\Models\User');
    }
}
