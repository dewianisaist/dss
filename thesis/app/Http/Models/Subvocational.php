<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Subvocational extends Model
{
    protected $table = 'sub_vocationals';
    
    public $fillable = ['vocational_id', 'name', 'quota', 'long_training', 'goal', 'unit_competence', 'requirement_participant', 'final_registration_date'];

    public function vocational() {
        return $this->belongsTo('App\Http\Models\Vocational');
    }

    public function registrant() {
        return $this->belongsToMany('App\Http\Models\Registrant', 'registration');
    }
}
