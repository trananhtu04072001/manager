<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule_again extends Model
{
    use HasFactory;

    protected $table = 'schedule_agains';

    protected $fillable = [
        'admin_id',
        'subject_id',
        'room',
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
}
