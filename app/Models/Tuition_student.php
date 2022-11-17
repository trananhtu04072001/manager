<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuition_student extends Model
{
    use HasFactory;

    protected $table = 'tuition_students';


    protected $fillable = [
        'title',
        'student_id',
        'tuition_id',
        'payment',
        'total',
        'count',
        'status',
    ];

    public function student() {
        return $this->belongsTo('App\Models\Student');
    }
    public function tuition() {
        return $this->belongsTo('App\Models\Tuition_course');
    }
}
