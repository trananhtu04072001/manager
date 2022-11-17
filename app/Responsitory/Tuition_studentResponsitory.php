<?php

namespace App\Responsitory;

use App\Models\Tuition_student;

class Tuition_studentResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Tuition_student::class;
    }
}