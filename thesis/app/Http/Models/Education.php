<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    public function registrant() {
        return $this->belongsToMany('App\Http\Models\Registrant', 'educational_background');
    }
}
