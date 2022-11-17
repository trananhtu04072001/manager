<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary_detail extends Model
{
    use HasFactory;

    protected $table = 'salary_details';


    protected $fillable = [
        'salary_id',
        'Salary_bonus',
    ];

    public function salary() {
        return $this->belongsTo('App\Models\Salary');
    }
}
