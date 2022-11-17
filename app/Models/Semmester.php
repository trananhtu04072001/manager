<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semmester extends Model
{
    use HasFactory;

    protected $table = "semmesters";

    protected $fillable = [
        'name',
    ];
}
