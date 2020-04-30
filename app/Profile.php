<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'address', 'contact', 'email', 'birthdate'
    ];
}
