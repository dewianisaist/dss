<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registration';
    
    public $fillable = ['registrant_id','sub_vocational_id','register_date'];   
        
    public $timestamps = false; 
}
