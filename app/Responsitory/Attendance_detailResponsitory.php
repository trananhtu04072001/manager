<?php

namespace App\Responsitory;

use App\Models\Attendance_detail;
use Illuminate\Support\Facades\DB;

class Attendance_detailResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Attendance_detail::class;
    }

    public function getAll()
    {
        return Attendance_detail::select('student_id','subject_id','room_id',DB::raw('SUM(active) as sum'))->with(['student:id,name','subject:id,name,hour,hour_learn','room:id,name'])
        ->groupBy('student_id')->groupBy('subject_id')->groupBy('room_id')->get();
    }
}