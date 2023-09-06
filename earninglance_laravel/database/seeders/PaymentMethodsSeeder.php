<?php

namespace Database\Seeders;

use App\Models\PaymentMethods;
use App\Models\UserPayments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethods::insert([
            'name' => 'Easypaisa',
            'account_name' => 'Hassan Jani',
            'account_number' => 2432424,
        ]);
    }
}
