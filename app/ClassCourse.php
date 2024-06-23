<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    protected $fillable = [
        'name',
        'trainer_id',
        'course_id',
        'price',
        'created_by',
    ];
}
