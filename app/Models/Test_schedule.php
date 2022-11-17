<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule_exams';

    protected $fillable = [
        'admin_id',
        'subject_id',
        'room_id',
        'attendance_time',
        'start',
        'end',
        'status',
    ];

    public function admin() {
        return $this->belongsTo('App\Models\Admin');
    }

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function room() {
        return $this->belongsTo('App\Models\Room');
    }
}
