<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;
    protected $table ='tb_cluster';
    protected $primaryKey ='cluster_id';
    protected $fillable=['floor_id','cluster_name'];
}
