<?php

namespace Database\Seeders;

use App\Models\Weight;
use Illuminate\Database\Seeder;

class WeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $weights = [

            [
                'type' => 'kg',
            ],


            [
                'type' => 'lbs',
            ],


        ];

        foreach ($weights as $weight) {
            $new_weight = Weight::create($weight);
        }
    }
}
