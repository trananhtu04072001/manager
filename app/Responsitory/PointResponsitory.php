<?php

namespace App\Responsitory;

use App\Models\Point;
use App\Models\Student;

class PointResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Point::class;
    }

    // public function create(array $attribute)
    // {
    //     for($i = 0 ; $i < count($attribute['student_id']) ; $i++)
    //     {
    //     $point = new Point();
    //     $point->student_id = $attribute['student_id'][$i];
    //     $point->room_id = $attribute['room_id'];
    //     $point->subject_id = $attribute['subject_id'];
    //     if($attribute['point_two'][$i] == null && $attribute['point_one'][$i] != null) {
    //         $point->point_one = $attribute['point_one'][$i];
    //         $point->point_two = '0';
    //     }
    //     if($attribute['point_one'][$i] == null && $attribute['point_two'][$i] != null) {
    //         $point->point_one = '0';
    //         $point->point_two = $attribute['point_two'][$i];
    //     }
    //     $point->description = $attribute['description'];
    //     $point->save();
    // }
    // }
}