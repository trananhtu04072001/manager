<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'name',
        'course_id',
        'major_id',
    ];

    public function course() {
        return $this->belongsTo('App\Models\Course');
    }

    public function major() {
        return $this->belongsTo('App\Models\Major');
    }
}
