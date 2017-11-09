<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class CourseExperience extends Model
{
    protected $table = 'course_experience';
    public $fillable = ['registrant_id','course_id','organizer','graduation_year'];   
    public $timestamps = false; 
}
