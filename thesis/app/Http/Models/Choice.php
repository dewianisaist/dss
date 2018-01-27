<?php

namespace App\App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = 'choices';
    
    public $fillable = ['user_id', 'criteria_id', 'option', 'suggestion'];

    public function user() {
        return $this->belongsTo('App\Http\Models\User');
    }

    public function criteria() {
        return $this->belongsTo('App\Http\Models\Criteria');
    }
}
