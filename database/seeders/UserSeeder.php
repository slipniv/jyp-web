<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Supper\Facades\DB;
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
        DB::table('user')->updateOrCreate(
            ['name' => 'admin'],
            ['name' => 'admin', 'email' => 'sample@admin.com', 'password' => '$2y$10$hXBXJoxkmgHARHRtH6nw0ebZ.R8qXobEYvicGqx7a2YcBdJPeVZuy']
        );
    }
}
