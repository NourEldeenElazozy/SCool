<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainers extends Model
{
    protected $fillable = [
        'id',
        'namefirst',
        'lastname',
        'phone',
        'email',
        'password',
    ];
}
