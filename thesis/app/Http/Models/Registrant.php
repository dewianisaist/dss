<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
    protected $table = 'registrants';

    public function user() {
        return $this->belongsTo('App\Http\Models\User');
    }

    public function upload() {
        return $this->belongsTo('App\Http\Models\Upload');
    }

    public function educations() {
        return $this->belongsToMany('App\Http\Models\Education', 'educational_background');
    }

    public function courses() {
        return $this->belongsToMany('App\Http\Models\Course', 'course_experience');
    }
}
