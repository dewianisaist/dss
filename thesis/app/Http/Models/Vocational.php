<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Vocational extends Model
{
    protected $table = 'vocationals';
    
    public $fillable = ['name', 'description'];

    public function subvocational() {
        return $this->hasOne('App\Http\Models\Subvocational');
    }
}
