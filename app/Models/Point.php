<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $table = 'points';

    protected $fillable = [
        'schedule_id',
        'student_id',
        'room_id',
        'subject_id',
        'point_one',
        'point_two',
        'description',
    ];

    public function schedule() {
        return $this->belongsTo('App\Models\Test_schedule');
    }
    public function student() {
        return $this->belongsTo('App\Models\Student');
    }
    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function room() {
        return $this->belongsTo('App\Models\Room');
    }
}
