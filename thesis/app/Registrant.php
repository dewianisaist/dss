<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Eloquent
{
    public function user() {
        return $this->belongsTo('User');
    }

    public $fillable = ['name'];
}
