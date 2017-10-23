<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subvocational extends Model
{
    public $fillable = ['name', 'quota', 'long_training', 'goal', 'unit_competence'];

    public function vocationals
    {
        return $this->belongsTo('App\Vocational');
    }
}
