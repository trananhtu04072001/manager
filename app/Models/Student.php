<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'student_code',
        'name',
        'email',
        'phone',
        'address',
        'room_id',
        'course_id',
        'status',
    ];

    public function room() {
        return $this->belongsTo('App\Models\Room');
    }
    public function course() {
        return $this->belongsTo('App\Models\Course');
    }
}
