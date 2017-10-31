<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subvocational extends Model
{
    public $fillable = ['name', 'quota', 'long_training', 'goal', 'unit_competence', 'requirement_participant', 'final_registration_date'];

    public function vocationals()
    {
        return $this->belongsTo('App\Vocational');
    }
}
