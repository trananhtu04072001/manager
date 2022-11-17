<?php

namespace App\Responsitory;

use App\Models\Subject_status;

class Subject_statusResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Subject_status::class;
    }
}