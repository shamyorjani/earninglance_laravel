<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Plans;
use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_plans = [
            [
                'name' => 'Business Plan',
                'level' => 1,
                'charges' => 1500,
                'direct' => 600,
                'indirect' => 200,
                'bonus' => 2000,
                'features' => 'Direct commission
                Indirect commission
                Team bonus ',
            ], [
                'name' => 'Silver Plan',
                'level' => 2,
                'charges' => 3000,
                'direct' => 1200,
                'indirect' => 300,
                'bonus' => 5000,
                'features' => 'Direct commission
                Indirect commission
                Team bonus ',
            ], [
                'name' => 'Gold Plan',
                'level' => 3,
                'charges' => 4500,
                'direct' => 1100,
                'indirect' => 300,
                'bonus' => 7000,
                'features' => 'Direct/indirect commission
                Assignment ',
            ]
        ];
        Plans::insert($all_plans);
    }
}
