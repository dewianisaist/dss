<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    
    public $fillable = ['major'];
    
    public function registrant() {
        return $this->belongsToMany('App\Http\Models\Registrant', 'course_experience');
    }
}
