<?php

namespace App\Responsitory;

use App\Models\Salary_detail;
use Illuminate\Support\Facades\DB;

class SalarydetailResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Salary_detail::class;
    }

    public function getAll()
    {
        return Salary_detail::select('salary_id', DB::raw("SUM(salary_bonus) as salary_bonus,MONTH(created_at) as month"))
        ->groupBy('salary_id')->groupBy('month')->with('salary:id,admin_id,salary')->get();
    }
}