<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';

    public function level() {
        return $this->belongsTo('App\Models\Level');
    }

    protected $fillable = [
        'level_id',
        'name',
        'email',
        'phone',
        'address',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}
