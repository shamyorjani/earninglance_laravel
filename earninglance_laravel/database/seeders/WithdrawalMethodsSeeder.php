<?php

namespace Database\Seeders;

use App\Models\WithdrawalMethods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WithdrawalMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_methods = [
            [
                'name' => 'Easypaisa',
            ], [
                'name' => 'Jazzcash',
            ], [
                'name' => 'Sada Pay',
            ]
        ];
        WithdrawalMethods::insert($all_methods);
    }
}
