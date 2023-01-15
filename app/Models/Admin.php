<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard ='admin';

    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
