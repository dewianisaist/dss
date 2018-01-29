<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    protected $table = 'selections';
    
    public $fillable = ['registration_id', 'selection_schedule_id', 'written_value', 'interview_value', 'ranking', 'status'];

    public function selectionschedule() {
        return $this->belongsTo('App\Http\Models\SelectionSchedule','selection_schedule_id');
    }

    public function registrant() {
        return $this->belongsTo('App\Http\Models\Registrant');
    }
}
