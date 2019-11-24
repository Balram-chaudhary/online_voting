<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    protected $guard = 'admin';
    protected $table="nominee";
    protected $guarded = ['id'];
}
