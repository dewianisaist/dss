<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'documents';
    
    public $fillable = ['registrant_id', 'photo', 'ktp', 'last_certificate'];

    public function registrant() {
        return $this->belongsTo('App\Http\Models\Registrant');
    }
}
