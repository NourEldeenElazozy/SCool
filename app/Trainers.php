<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainers extends Model
{
    protected $fillable = [
        'id',
        'namefirst',
        'lastname',
        'fullname',
        'phone',
        'email',
        'password',
    ];
}
