<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    protected $fillable = [
        'name',
        'trainer_id',
        'debart',
        'coleg',
        'price',
        'created_by',
    ];
    public function trainer ()
    {
        return $this->belongsTo('App\trainers');
    }
}
