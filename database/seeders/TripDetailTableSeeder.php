<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('trip_detail')->insert([
        ['place' => 'Kathmandu', 'activities' => 'Cultural Heritage', 'travel_class' => 'Premium Class','travelling_days'=>'2', 'base_price' => 1250.00, 'commission_rate'=>0.05],
        ['place' => 'Kathmandu', 'activities' => 'Cultural Heritage', 'travel_class' => 'Economy Class','travelling_days'=>'2', 'base_price' => 1000.00, 'commission_rate'=>0.05],
        ['place' => 'Pokhara', 'activities' => 'Natural Beauty', 'travel_class' => 'Premium Class','travelling_days'=>'7', 'base_price' => 8000.00, 'commission_rate'=>0.05],
        ['place' => 'Pokhara', 'activities' => 'Natural Beauty', 'travel_class' => 'Economy Class','travelling_days'=>'7', 'base_price' => 5000.00, 'commission_rate'=>0.05],
        ['place' => 'Chitwan', 'activities' => 'Jungle Safari', 'travel_class' => 'Premium Class','travelling_days'=>'5', 'base_price' => 7500.00, 'commission_rate'=>0.05],
        ['place' => 'Chitwan', 'activities' => 'Jungle Safari', 'travel_class' => 'Economy Class','travelling_days'=>'5', 'base_price' => 5000.00, 'commission_rate'=>0.05],
    ]);
}


}
