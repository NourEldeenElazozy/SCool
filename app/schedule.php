<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    protected $fillable = [
        'id',
        'classcourses_id',
        'student_id',
        'start_time',
        'end_time',
        'attendance',
        'absence',
        'course_duration',
        'student_enrollment',
        'student_Present',
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