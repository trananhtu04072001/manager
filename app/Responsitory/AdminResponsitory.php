<?php

namespace App\Responsitory;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminResponsitory extends EloquentResponsitory {
    public function getModel()
    {
        return Admin::class;
    }

    public function create(array $attribute)
    {
        $admin = new Admin();
        $admin->level_id = $attribute['level_id'];
        $admin->name = $attribute['name'];
        $admin->email = $attribute['email'];
        $admin->phone = $attribute['phone'];
        $admin->address = $attribute['address'];
        $admin->password = Hash::make($attribute['password']);
        $admin->save();
    }
}