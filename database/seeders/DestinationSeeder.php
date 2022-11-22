<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Destination;


class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destination')->insert([
            ['area' => 'Zamboanga City'],
            ['area' => 'Iligan City'],
            ['area' => 'Cagayan De Oro City']
        ]);
    }
}
