<?php

namespace Database\Seeders;

use App\Models\FontAwesomeIcon;
use Illuminate\Database\Seeder;

class FontAwesomeIconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Code for fontAwesome 
        // https://fontawesome.com/v5/cheatsheet

        $fontawesome_icons = [

            [
                'name' => '<i class="fa-solid fa-computer"></i>',
            ],

            [
                'name' => '<i class="fa-solid fa-computer"></i>',
            ],

            [
                'name' => '<i class="fa-solid fa-computer"></i>',
            ],

            [
                'name' => '<i class="fa-solid fa-computer"></i>',
            ],

        ];

        foreach ($fontawesome_icons as $icon) {
            $icon = FontAwesomeIcon::create($icon);
        }
    }
}
