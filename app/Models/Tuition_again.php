<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuition_again extends Model
{
    use HasFactory;

    protected $table = 'tuition_agains';


    protected $fillable = [
        'subject_id',
        'tuition',
    ];

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }
}
