<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    protected $table ='tb_floor';
    protected $primaryKey ='floor_id';
    protected $fillable=['floor_name','floor_detail'];
}
