<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discount')->insert([
            ['min_people'=>1,'max_people'=>1,'discount_rate'=>0.00],
            ['min_people'=>2,'max_people'=>2,'discount_rate'=>0.05],
            ['min_people'=>3,'max_people'=>5,'discount_rate'=>0.075],
            ['min_people'=>6,'max_people'=>10,'discount_rate'=>0.10],
            ['min_people'=>11,'max_people'=>15,'discount_rate'=>0.125]
        ]);
    }
}
