<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'criterias';
    public $fillable = ['group_criteria', 'name', 'preference', 'parameter_p', 'parameter_q', 'parameter_s'];

    public function pairwisecomparison()
    {
        return $this->hasOne('App\Http\Models\PairwiseComparison');
    }
}
