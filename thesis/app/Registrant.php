<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'identity_number', 'email', 'password', 
        'name', 'identity_number', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function upload()
    {
        return $this->hasOne('App\Upload');
    }

    public function educations()
    {
        return $this->belongsToMany('App\Education', 'educational_background');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course', 'course_experience');
    }
}
