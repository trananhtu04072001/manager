<?php

namespace App\Responsitory;

use App\Models\Notifi;

class NotifiResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Notifi::class;
    }
}