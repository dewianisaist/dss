<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kejuruan extends Model
{
    protected $table = 'kejuruan';
    public $fillable = ['nama'];
}
