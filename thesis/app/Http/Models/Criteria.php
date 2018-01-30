<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criterias';
    
    public $fillable = ['group_criteria', 'name', 'description', 'partial_weight', 'global_weight', 'preference', 
                        'max_min', 'parameter_p', 'parameter_q', 'parameter_s', 'status'];

    public function resultselection() {
        return $this->hasOne('App\Http\Models\ResultSelection');
    }

    public function pairwisecomparison1() {
        return $this->hasOne('App\Http\Models\PairwiseComparison');
    }

    public function pairwisecomparison2() {
        return $this->hasOne('App\Http\Models\PairwiseComparison');
    }

    public function users() {
        return $this->belongsToMany('App\Http\Models\User', 'choice');
    }

    public function conversion() {
        return $this->hasOne('App\Http\Models\Conversion');
    }
}
