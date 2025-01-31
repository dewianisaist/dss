<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';
    
    public $fillable = ['registrant_id','sub_vocational_id', 'register_date'];   
        
    public $timestamps = false; 

    public function registrant() {
        return $this->belongsTo('App\Http\Models\Registrant');
    }

    public function subvocational() {
        return $this->belongsTo('App\Http\Models\Subvocational','sub_vocational_id');
    }

    public function selection() {
        return $this->hasOne('App\Http\Models\Selection');
    }
}
