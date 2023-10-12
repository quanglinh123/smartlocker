<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    use HasFactory;
    protected $table ='tb_adminrole';
    protected $primaryKey ='adminrole_id';
    protected $fillable=['adminrole_name'];
}
