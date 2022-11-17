<?php

namespace App\Responsitory;

use App\Models\Schedule;

class ScheduleResponsitory extends EloquentResponsitory implements ScheduleInterface
{
    public function getModel()
    {
        return Schedule::class;
    }

    // public function update($id, array $attribute)
    // {
    //     $schedule = Schedule::find($id);
    //     $schedule->status = $attribute['status'];
    //     $schedule->save();
    // }

    public function scope(array $atribute)
    {
        $sche = Schedule::get();
        for($i = 0 ; $i < count($sche) ; $i++){
            $datestart=date_create($atribute['start']);
            $dateformat = date_format($datestart,'Y-m-d H:i:s');
            $dateEnd = date_create($atribute['end']);
            $date_end = date_format($dateEnd,'Y-m-d H:i:s');
            if(in_array($atribute['admin_id'],array($sche[$i]->admin_id))
             && in_array($atribute['subject_id'],array($sche[$i]->subject_id))
             && in_array($atribute['room_id'],array($sche[$i]->room_id))
             && in_array($dateformat,array($sche[$i]->start))
             && in_array($date_end,array($sche[$i]->end))
             ) {
                return redirect()->route('schedule.get')->with('success','Lịch dạy đã tồn tại');
            }
        }
        die;
    }
}