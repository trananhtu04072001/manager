<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
        'session',
        'admin_id',
        'schedule_id',
        'description',
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
    public function schedule() {
        return $this->belongsTo('App\Models\Schedule');
    }

    public function attendance_detail() {
        return $this->hasMany('App\Models\Attendance_detail');
    }
}
