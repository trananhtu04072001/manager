<?php

namespace App\Responsitory;

use App\Models\Test_schedule;

class Test_scheduleResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Test_schedule::class;
    }
}