<?php
namespace App\Responsitory;

use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

class AttendanceResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Attendance::class;
    }
}