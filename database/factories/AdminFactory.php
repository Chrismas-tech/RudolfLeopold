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
            'password' => '$2y$12$G86z3cmSSkYn4dq4kPDDW.pFhXJctyy4sim6DTZmTkWN6CfSO6DeO', // password
            'remember_token' => Str::random(10),
        ];
    }
}
