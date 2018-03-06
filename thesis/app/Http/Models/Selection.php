<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    protected $table = 'selections';
    
    public $fillable = ['registration_id', 'selection_schedule_id', 'written_value', 'interview_value', 'recommendation', 'ranking', 'status'];

    public function selectionschedule() {
        return $this->belongsTo('App\Http\Models\SelectionSchedule','selection_schedule_id');
    }

    public function registrant() {
        return $this->belongsTo('App\Http\Models\Registrant');
    }

    public function registration() {
        return $this->belongsTo('App\Http\Models\Registration');
    }

    public function criterias() {
        return $this->belongsToMany('App\Http\Models\Criteria', 'result_selection');
    }
}
