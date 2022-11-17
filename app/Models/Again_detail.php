<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Again_detail extends Model
{
    use HasFactory;

    protected $table = 'again_details';

    protected $fillable = [
        'student_id',
        'tuition_again_id',
    ];

    public function student() {
        return $this->belongsTo('App\Models\Student');
    }

    public function tuition_again() {
        return $this->belongsTo('App\Models\Tuition_again');
    }
}
