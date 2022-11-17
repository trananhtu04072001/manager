<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Admin::create([
            'Level_id' => '1',
            'name' => 'Trần Anh Tú',
            'email' => 'superadmin1@gmail.com',
            'phone' => '0857607645',
            'address' => 'Nam định',
            'password' => bcrypt('xxxxxxxx'),
            'status' => '1',
        ]);
    }
}
