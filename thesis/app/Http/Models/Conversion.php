<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    protected $table = 'conversions';
    
    public $fillable = ['criteria_id', 'resource', 'range_value_1', 'range_value_2', 'conversion_value'];

    public function criteria() {
        return $this->belongsTo('App\Http\Models\Criteria');
    }
}
