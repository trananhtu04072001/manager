<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuition_course extends Model
{
    use HasFactory;

    protected $table = "tuition_courses";
    protected $fillable = [
        'course_id',
        'major_id',
        'tuition'
    ];

    public function course() {
        return $this->belongsTo('App\Models\Course');
    }

    public function major() {
        return $this->belongsTo('App\Models\Major');
    }
}
