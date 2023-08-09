<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $users = [

            [
                'firstname' => 'Bernard',
                'lastname' => 'Blier',
                'email' => 'a@gmail.com',
                'email_verified_at' => now(),
                'address' => '60 bis avenue des arènes de Cimiez, Villa Mon Rêve',
                'city' => 'Nice',
                'postal_code' => '06000',
                'phone' => '0487654812',
                'email_verified_at' => now(),
                'email_verified_at' => now(),
                'password' => '$2y$12$f2KH9sSrqvv/Y2x9AlMY.uSqAxfvLc4CIKA47wmFDMUh/q3RVE6qq', // 123456789
                'remember_token' => Str::random(10),
            ],

            [
                'firstname' => 'Jean',
                'lastname' => 'De la flûte',
                'email' => 'b@gmail.com',
                'email_verified_at' => now(),
                'address' => '60 bis avenue des arènes de Cimiez, Villa Mon Rêve',
                'city' => 'Nice',
                'postal_code' => '06000',
                'phone' => '0487654812',
                'email_verified_at' => now(),
                'email_verified_at' => now(),
                'password' => '$2y$12$f2KH9sSrqvv/Y2x9AlMY.uSqAxfvLc4CIKA47wmFDMUh/q3RVE6qq', // 123456789
                'remember_token' => Str::random(10),
            ],

            [
                'firstname' => 'Harry',
                'lastname' => 'Potter',
                'email' => 'c@gmail.com',
                'email_verified_at' => now(),
                'address' => '60 bis avenue des arènes de Cimiez, Villa Mon Rêve',
                'city' => 'Nice',
                'postal_code' => '06000',
                'phone' => '0487654812',
                'email_verified_at' => now(),
                'email_verified_at' => now(),
                'password' => '$2y$12$f2KH9sSrqvv/Y2x9AlMY.uSqAxfvLc4CIKA47wmFDMUh/q3RVE6qq', // 123456789
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            $new_user = User::create($user);
        }
    }
}
