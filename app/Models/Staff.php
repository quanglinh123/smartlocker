<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table ='tb_staff';
    protected $primaryKey ='staff_id';
    protected $fillable=['cabinet_id','staff_name','staff_phone','staff_status'];
}
