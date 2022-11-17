<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifi extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'subject_id',
        'room_id',
        'title',
        'read_at',
    ];

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function room() {
        return $this->belongsTo('App\Models\Room');
    }
}
