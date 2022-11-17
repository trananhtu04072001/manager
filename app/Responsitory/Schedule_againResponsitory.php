<?php

namespace App\Responsitory;

use App\Models\Schedule_again;

class Schedule_againResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Schedule_again::class;
    }
}