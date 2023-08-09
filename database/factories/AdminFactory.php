<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => 'Christophe',
            'lastname' => 'Luciani',
            'address' => '27 rue Paul Déroulède',
            'city' => 'NICE',
            'postal_code' => '06000',
            'phone' => '0646704875',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$12$f2KH9sSrqvv/Y2x9AlMY.uSqAxfvLc4CIKA47wmFDMUh/q3RVE6qq', // 123456789
            'remember_token' => Str::random(10),
        ];
    }
}
