<?php

namespace App\Responsitory;

use App\Models\Room;

class RoomResponsitory extends EloquentResponsitory
{
    public function getModel()
    {
        return Room::class;
    }

    public function getAll()
    {
        return Room::with(['course:id,name','major:id,name'])->get();
    }
}