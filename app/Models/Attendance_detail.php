<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance_detail extends Model
{
    use HasFactory;

    protected $table = 'attendance_details';

    protected $fillable = [
        'student_id',
        'status_learn',
        'subject_id',
        'room_id',
        'active',
        'des',
        'attendance_id',
    ];

    public function student() {
        return $this->belongsTo('App\Models\Student');
    }
    public function attendance() {
        return $this->belongsTo('App\Models\Attendance');
    }
    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }
    public function room() {
        return $this->belongsTo('App\Models\Room');
    }
}
