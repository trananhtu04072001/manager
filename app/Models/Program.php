<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = "programs";


    protected $fillable = [
        'majors_id',
        'subject_id',
        'semmester_id',
    ];

    public function majors(){
        return $this->belongsTo('App\Models\Major');
    }

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function semmester() {
        return $this->belongsTo('App\Models\Semmester');
    }
}
