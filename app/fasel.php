<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fasel extends Model
{
    protected $fillable = [
        'classcourses_id',
        'student_id',
        'price',
    ];
    public function student ()
    {
        return $this->belongsTo('App\student');
    }
    public function classcourses ()
    {
        return $this->belongsTo('App\ClassCourse');
    }
}
