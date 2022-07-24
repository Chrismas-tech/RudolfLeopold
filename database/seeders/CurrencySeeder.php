<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [

            [
                'name' => 'Euros',
                'value' => 'EUR',
            ],


            [
                'name' => 'Dollars',
                'value' => 'USD',
            ],


        ];

        foreach ($currencies as $currency) {
            $new_currency = Currency::create($currency);
        }
    }
}
