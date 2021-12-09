<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale_user extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id';

    protected $table='sale_users';

    protected $fillable = [
      'id','id_user','total'
    ];
}
