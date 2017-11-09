<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class CourseExperience extends Model
{
    protected $table = 'course_experience';
    public $fillable = ['organizer','graduation_year'];   
    public $timestamps = false; 
}
