<?php

namespace App\Responsitory;

use App\Models\Tuition_course;

class Tuition_courseResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Tuition_course::class;
    }
}