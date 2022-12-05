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
            ['area' => 'Zamboanga City', 'latitude' => '6.9214', 'longitude' => '122.0790'],
            ['area' => 'Iligan City', 'latitude' => '8.2280', 'longitude' => '124.2452'],
            ['area' => 'Cagayan De Oro City', 'latitude' => '8.4803', 'longitude' => '124.6498'],
            ['area' => 'Tagoloan Plaza', 'latitude' => '8.539509', 'longitude' => '124.754158'],
            ['area' => 'Blue Energy Villanueva', 'latitude' => '8.583770', 'longitude' => '124.770792'],
            ['area' => 'Petron Villanueva', 'latitude' => '8.585504', 'longitude' => '124.770893'],
            ['area' => 'Coca-Cola Villanueva', 'latitude' => '8.579211', 'longitude' => '124.770491']
        ]);
    }
}
