<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_status extends Model
{
    use HasFactory;

    protected $table = 'subject_statuses';


    protected $fillable = [
        'schedule_id',
        'subject_id',
        'room_id',
        'hour_learn',
        'hour',
    ];


    public function schedule() {
        return $this->belongsTo('App\Models\Schedule');
    }

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function room() {
        return $this->belongsTo('App\Models\Room');
    }
}
