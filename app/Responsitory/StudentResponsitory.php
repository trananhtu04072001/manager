<?php

namespace App\Responsitory;

use App\Models\Student;

class StudentResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Student::class;
    }
}