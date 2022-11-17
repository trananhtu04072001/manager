<?php
namespace App\Responsitory;

use App\Models\Tuition_again;

class Tuition_againResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Tuition_again::class;
    }
}