<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class CourseExperience extends Model
{
    protected $table = 'course_experience';

    public $fillable = ['registrant_id','course_id','organizer','graduation_year'];   
    
    public $timestamps = false; 

    public function registrant() {
        return $this->belongsTo('App\Http\Models\Registrant');
    }

    public function course() {
        return $this->belongsTo('App\Http\Models\Course');
    }
}
