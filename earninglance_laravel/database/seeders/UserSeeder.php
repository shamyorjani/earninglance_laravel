<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'balance' => '14000',
            'name' => 'Ehtisham Farman',
            'username' => 'shami',
            'email' => 'shami@gmail.com',
            'phone' => '354324324',
            'password' => Hash::make('hellobody'),
            'referral' => 'refri',
            'indirect' => 'Admin',
            'role' => '2',
        ]);
    }
}
