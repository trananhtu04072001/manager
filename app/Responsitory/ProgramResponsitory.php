<?php

namespace App\Responsitory;

use App\Models\Program;

class ProgramResponsitory extends EloquentResponsitory 
{
    public function getModel()
    {
        return Program::class;
    }

    public function create(array $attribute)
    {
        foreach($attribute['subject_id'] as $subject) {
            $program = new Program();
            $program->majors_id = $attribute['majors_id'];
            $program->subject_id = $subject;
            $program->semmester_id = $attribute['semmester_id'];
            $program->save();
        }
    }
}