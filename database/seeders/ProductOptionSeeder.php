<?php

namespace Database\Seeders;

use App\Models\ProductOption;
use Illuminate\Database\Seeder;

class ProductOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_options =
            [
                // clothes
                [
                    'name' => 'clothes',
                    'value' => json_encode([
                        'XS',
                        'S',
                        'L',
                        'M',
                        'XL',
                        '2XL',
                        '3XL'
                    ]),
                ],

                // colors
                [
                    'name' => 'colors',
                    'value' => json_encode([
                        'red',
                        'green',
                        'blue',
                        'yellow',
                        'orange',
                        'white',
                        'black',
                    ]),
                ],


                // shoesFR
                [
                    'name' => 'shoesFR',
                    'value' => json_encode([
                        '35',
                        '35,5',
                        '36',
                        '36,5',
                        '37',
                        '37,5',
                        '38',
                        '38,5',
                        '39',
                        '39,5',
                        '40',
                        '40,5',
                        '41,5',
                        '42',
                        '42,5',
                        '43',
                        '43,5',
                        '44',
                        '44,5',
                        '45',
                        '45,5',
                        '46',
                        '46,5',
                        '47,5',
                        '48',
                        '48,5',
                        '49',
                        '49,5',
                        '50'
                    ]),
                ],


                // ram
                [
                    'name' => 'ram',
                    'value' => json_encode([
                        '2GB',
                        '4GB',
                        '6GB',
                        '8GB'
                    ]),
                ],

                // OPERATING SYSTEM
                [
                    'name' => 'os',
                    'value' => json_encode([
                        'android',
                        'windows',
                        'apple',
                        'linux'
                    ]),
                ],

            ];

        foreach ($product_options as $option) {
            $new_option = ProductOption::create($option);
        }
    }
}
