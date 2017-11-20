<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    protected $table = 'selections';
    
    public $fillable = ['registrant_id', 'selection_schedule_id', 'written_value', 'interview_value'];

    public function selectionschedule() {
        return $this->belongsTo('App\Http\Models\SelectionSchedule','selection_schedule_id');
    }

    public function registrant() {
        return $this->belongsTo('App\Http\Models\Registrant');
    }
}
