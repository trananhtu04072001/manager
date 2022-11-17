<?php

namespace App\Responsitory;

use App\Models\Salary;

class SalaryResponsitory extends EloquentResponsitory
{
    public function  getModel()
    {
        return Salary::class;
    }
}