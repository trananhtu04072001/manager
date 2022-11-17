<?php

namespace App\Responsitory;

use App\Models\Exam_status;

class Exam_statusResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Exam_status::class;
    }

    public function create(array $attribute)
    {
        $sum = $attribute['sum'];
        $learn = $attribute['learn'];
        for ($i = 0 ; $i < count($attribute['student_id']) ; $i++) {
        $exam = new Exam_status();
        $exam->subject_id = $attribute['subject_id'];
        $exam->room_id = $attribute['room_id'];
        $exam->student_id = $attribute['student_id'][$i];
            if($sum[$i] >= $learn*10/100){
                $exam->status_learn = 0;
            }
            if($sum[$i] < $learn*10/100) {
                $exam->status_learn = 1;
            }
            $exam->save();
        }
       }
}