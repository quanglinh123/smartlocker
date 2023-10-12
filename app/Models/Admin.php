<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;use Notifiable;

    protected $table = 'tb_admin';
    protected $primaryKey ='admin_id';

    protected $fillable =['admin_name','password'];
}
