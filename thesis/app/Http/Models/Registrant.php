<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
    protected $table = 'registrants';

    public $fillable = ['user_id', 'address', 'phone_number', 'gender', 'place_birth', 'date_birth', 'order_child', 'amount_sibling', 'religion', 'biological_mother_name', 'father_name', 'parent_address'];

    protected $hidden = ['password'];

    public function user() {
        return $this->belongsTo('App\Http\Models\User');
    }

    public function upload() {
        return $this->hasOne('App\Http\Models\Upload');
    }

    public function educations() {
        return $this->belongsToMany('App\Http\Models\Education', 'educational_background');
    }

    public function courses() {
        return $this->belongsToMany('App\Http\Models\Course', 'course_experience');
    }

    public function subvocationals() {
        return $this->belongsToMany('App\Http\Models\Subvocational', 'registration');
    }

    public function selection() {
        return $this->hasOne('App\Http\Models\Selection');
    }
}
