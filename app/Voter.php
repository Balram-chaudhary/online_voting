<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Voter extends Authenticatable
{
use Notifiable;

    protected $guard = 'voter';
    protected $table="voters";
    protected $guarded = ['id'];
    protected $hidden = [
        'password', 'remember_token',
    ];

}
