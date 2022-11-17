<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table = 'salaries';

    protected $fillable = [
        'admin_id',
        'salary',
    ];

    public function admin() {
        return $this->belongsTo('App\Models\Admin');
    }
}
