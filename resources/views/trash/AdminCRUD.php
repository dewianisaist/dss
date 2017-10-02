<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminCRUD extends Model
{
    protected $table = 'admins';
    protected $primaryLey = 'id';
    protected $fillable = [
        'nip', 'password', 'is_permission'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
