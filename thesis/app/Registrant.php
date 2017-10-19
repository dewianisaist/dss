<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
    
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function upload()
    {
        return $this->hasOne('App\Upload');
    }

    public function educations()
    {
        return $this->belongsToMany('App\Education', 'educational_background');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course', 'course_experience');
    }
}
