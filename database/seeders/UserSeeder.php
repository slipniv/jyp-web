<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert(
            ['name' => 'admin'],
            ['name' => 'admin', 'email' => 'sample@admin.com', 'password' => '$2y$10$rGTUvPqFRxtReuzoX7.4bO/6aZCkUrIIIku4SUnRPUuksUcO7s5Nu']
        );
    }
}
