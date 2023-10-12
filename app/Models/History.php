<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table ='tb_history';
    protected $primaryKey ='history_id';
    protected $fillable=['cabinet_id','status2'];
}
