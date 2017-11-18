<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class SelectionSchedule extends Model
{
    protected $table = 'selection_schedules';
    
    public $fillable = ['sub_vocational_id', 'date', 'time', 'place', 'information'];

    public function subvocational() {
        return $this->belongsTo('App\Http\Models\Subvocational');
    }
}
