<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_status extends Model
{
    use HasFactory;

    protected $table = 'exam_statuses';

    protected $fillable = [
        'subject_id',
        'room_id',
        'student_id',
        'status_learn',
    ];

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function room() {
        return $this->belongsTo('App\Models\Room');
    }

    public function student() {
        return $this->belongsTo('App\Models\Student');
    }
}
