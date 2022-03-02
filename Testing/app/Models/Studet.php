<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Studet extends Authenticatable
{
    use HasApiTokens, HasFactory;

    
    protected $fillable = [
        'en_no',
        'name',
        'email',
        'password',
        'rank'
    ];
    protected $hidden = ['password','created_at','updated_at']; 
}
