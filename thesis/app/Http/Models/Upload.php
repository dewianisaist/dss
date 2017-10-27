<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploads';

    public function registrant() {
        return $this->hasOne('App\Http\Models\Registrant');
    }
}
