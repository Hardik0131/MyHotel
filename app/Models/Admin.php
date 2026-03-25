<?php

namespace App\Models;

// use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
