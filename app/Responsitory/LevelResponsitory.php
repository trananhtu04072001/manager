<?php

namespace App\Responsitory;


use App\Models\Level;

class LevelResponsitory extends EloquentResponsitory {
    public function getModel()
    {
        return Level::class;
    }
}
