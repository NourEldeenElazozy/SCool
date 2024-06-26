<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'id',
        'academicnumber',
        'firestname',
        'fullname',
        'age',
        'email',
        'password',
        'lastname',
    ];
}
