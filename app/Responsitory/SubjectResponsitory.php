<?php

namespace App\Responsitory;

use App\Models\Subject;

class SubjectResponsitory extends EloquentResponsitory 
{
    public function getModel()
    {
        return Subject::class;
    }
}