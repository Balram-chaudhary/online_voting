<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guard = 'voter';
    protected $table="votes";
    protected $guarded = ['id'];
}
