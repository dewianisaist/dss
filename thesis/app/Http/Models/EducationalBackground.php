<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    protected $table = 'educational_background';

    public $fillable = ['education_id', 'registrant_id', 'name_institution', 'graduation_year'];   
     
    public $timestamps = false;
}
