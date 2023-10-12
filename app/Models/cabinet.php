<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cabinet extends Model
{
    use HasFactory;
    protected $table ='tb_cabinet';
    protected $primaryKey ='cabinet_id';
    protected $fillable=['status1','status2'];
}
