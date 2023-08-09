<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'a',
            'email' => 'a@gmail.com',
            'email_verified_at' => now(),
            'address' => '60 bis avenue des arènes de Cimiez, Villa Mon Rêve',
            'city' => 'Nice',
            'postal_code' => '06000',
            'phone' => '0487654812',
            'email_verified_at' => now(),
            'email_verified_at' => now(),
            'password' => '$2y$12$ejVwREhFvxwCbc7k/ZkmWe93BeP3RURXkgsEj4v1iVjLegiTpB0eG', // 12345678
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
