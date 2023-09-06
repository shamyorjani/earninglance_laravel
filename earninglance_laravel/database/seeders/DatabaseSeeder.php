<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contact;
use App\Models\Plans;
use App\Models\WithdrawalRequest;
use App\Models\WithdrawalMethods;
use App\Models\PaymentMethods;
use App\Models\UserPayments;
use App\Models\UserHasPlan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            PaymentMethodsSeeder::class,
            WithdrawalMethodsSeeder::class,
            PlansSeeder::class,
            UserSeeder::class,
        ]);

        $faker = \Faker\Factory::create();
        // User::factory(10)->create();
        // User::insert([
        //     'balance' => $faker->numberBetween(100, 5000),
        //     'name' => $faker->name(),
        //     'username' => $faker->username(),
        //     'email' => $faker->email(),
        //     'phone' => $faker->numberBetween(100000000, 900000000),
        //     'password' => Hash::make('password'),
        //     'referral' => $faker->randomElement(['refere', 'refef']),
        //     'indirect' => $faker->randomElement(['indirect']),
        //     'role' => $faker->randomElement(['1', '2']),
        // ]);

        // Contact::insert([
        //     'firstname' => $faker->firstname(),
        //     'lastname' => $faker->lastname(),
        //     'email' => $faker->email(),
        //     'msg' => $faker->randomLetter(),
        // ]);
        // UserPayments::insert([
        //     'plan_id' => $faker->numberBetween(1,50),
        //     'username' => $faker->username(),
        //     'amount' => $faker->numberBetween(1500,4000),
        //     'method_id' => $faker->numberBetween(1,100),
        //     'status' => $faker->numberBetween(1,2),
        //     'image' => $faker->randomLetter(),
        // ]);

        // WithdrawalRequest::insert([
        //     'username' => $faker->username(),
        //     'amount' => $faker->numberBetween(1000,3000),
        //     'fullname' => $faker->name(1500,4000),
        //     'number' => $faker->numberBetween(100000000,60000000),
        //     'method_id' => $faker->numberBetween(1,20),
        //     'status' => $faker->numberBetween(1,2),
        // ]);


        // UserHasPlan::insert([
        //     'username' => $faker->name(),
        //     'plan_id' => $faker->numberBetween(1, 10000),
        // ]);
    }
}
