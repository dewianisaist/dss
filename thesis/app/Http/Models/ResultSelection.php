<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ResultSelection extends Model
{
    protected $table = 'result_selections';
    
    public $fillable = ['selection_id', 'criteria_id', 'value'];

    public function criteria() {
        return $this->belongsTo('App\Http\Models\Criteria');
    }
}
