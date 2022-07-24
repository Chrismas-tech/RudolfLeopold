<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            // Main Categories
            [
                'name' =>  'HighTech',
                'slug' => Str::slug('HighTech'),
                'parent_id' => null,
            ],
            [
                'name' =>  'Vêtements',
                'slug' => Str::slug('Vêtements'),
                'parent_id' => null,
            ],
            [
                'name' =>  'Livres',
                'slug' => Str::slug('Livres'),
                'parent_id' => null,
            ],

            [
                'name' =>  'Audio et Hifi',
                'slug' => Str::slug('Audio et Hifi'),
                'parent_id' => 1,
            ],
            [
                'name' =>  'Téléphonie',
                'slug' => Str::slug('Téléphonie'),
                'parent_id' => 1,
            ],
            [
                'name' =>  'Informatique',
                'slug' => Str::slug('Informatique'),
                'parent_id' => 1,
            ],



            [
                'name' =>  'Casques & écouteurs',
                'slug' => Str::slug('Casques & écouteurs'),
                'parent_id' => 4,
            ],
            [
                'name' =>  'Enceintes',
                'slug' => Str::slug('Enceintes'),
                'parent_id' => 4,
            ],
            [
                'name' =>  'Chaînes Hi-fi',
                'slug' => Str::slug('Chaînes Hi-fi'),
                'parent_id' => 4,
            ],


            [
                'name' =>  'Wiko',
                'slug' => Str::slug('Wiko'),
                'parent_id' => 5,
            ],
            [
                'name' =>  'Huawei',
                'slug' => Str::slug('Huawei'),
                'parent_id' => 5,
            ],
            [
                'name' =>  'LG',
                'slug' => Str::slug('LG'),
                'parent_id' => 5,
            ],
            [
                'name' =>  'Xiaomi',
                'slug' => Str::slug('Xiaomi'),
                'parent_id' => 5,
            ],



            [
                'name' =>  'Ordinateur de bureau',
                'slug' => Str::slug('Ordinateur de bureau'),
                'parent_id' => 6,
            ],
            [
                'name' =>  'Ordinateurs portables',
                'slug' => Str::slug('Ordinateurs portables'),
                'parent_id' => 6,
            ],
            [
                'name' =>  'Ecrans PC',
                'slug' => Str::slug('Ecrans PC'),
                'parent_id' => 6,
            ],
            [
                'name' =>  'Accessoires PC',
                'slug' => Str::slug('Accessoires PC'),
                'parent_id' => 6,
            ],


            [
                'name' =>  'Homme',
                'slug' => Str::slug('Homme'),
                'parent_id' => 2,
            ],
            [
                'name' =>  'Femme',
                'slug' => Str::slug('Femme'),
                'parent_id' => 2,
            ],
            [
                'name' =>  'Garçon',
                'slug' => Str::slug('Garçon'),
                'parent_id' => 2,
            ],
            [
                'name' =>  'Fille',
                'slug' => Str::slug('Fille'),
                'parent_id' => 2,
            ],


            [
                'name' =>  'Pantalons',
                'slug' => Str::slug('Pantalons'),
                'parent_id' => 18,
            ],
            [
                'name' =>  'Costumes et vestes',
                'slug' => Str::slug('Costumes et vestes'),
                'parent_id' => 18,
            ],
            [
                'name' =>  'Jeans',
                'slug' => Str::slug('Jeans'),
                'parent_id' => 18,
            ],



            [
                'name' =>  'Robes',
                'slug' => Str::slug('Robes'),
                'parent_id' => 19,
            ],
            [
                'name' =>  'T-shirts',
                'slug' => Str::slug('T-shirts'),
                'parent_id' => 19,
            ],
            [
                'name' =>  'Jeans',
                'slug' => Str::slug('Jeans'),
                'parent_id' => 19,
            ],

            [
                'name' =>  'Sweats',
                'slug' => Str::slug('Sweats'),
                'parent_id' => 20,
            ],
            [
                'name' =>  'Shorts',
                'slug' => Str::slug('Shorts'),
                'parent_id' => 20,
            ],

            [
                'name' =>  'Manteaux et blousons',
                'slug' => Str::slug('Manteaux et blousons'),
                'parent_id' => 21,
            ],
            [
                'name' =>  'Sweats',
                'slug' => Str::slug('Sweats'),
                'parent_id' => 21,
            ],



            [
                'name' =>  'Romans et littérature',
                'slug' => Str::slug('Romans et littérature'),
                'parent_id' => 3,
            ],
            [
                'name' =>  'Bandes dessinées',
                'slug' => Str::slug('Bandes dessinées'),
                'parent_id' => 3,
            ],
            [
                'name' =>  'Livres pour enfants',
                'slug' => Str::slug('Livres pour enfants'),
                'parent_id' => 3,
            ],

            [
                'name' =>  'Comics',
                'slug' => Str::slug('Comics'),
                'parent_id' => 33,
            ],
            [
                'name' =>  'Fantastique',
                'slug' => Str::slug('Fantastique'),
                'parent_id' => 33,
            ],
            [
                'name' =>  'Policier et Suspense',
                'slug' => Str::slug('Policier et Suspense'),
                'parent_id' => 33,
            ],

            [
                'name' =>  'Templates',
                'slug' => Str::slug('Templates'),
                'parent_id' => null,
            ],

            [
                'name' =>  'Boostrap 3',
                'slug' => Str::slug('Boostrap 3'),
                'parent_id' => 38,
            ],

            [
                'name' =>  'Boostrap 4',
                'slug' => Str::slug('Boostrap 4'),
                'parent_id' => 38,
            ],

            [
                'name' =>  'Boostrap 5',
                'slug' => Str::slug('Boostrap 5'),
                'parent_id' => 38,
            ],



            [
                'name' =>  'Chaussures',
                'slug' => Str::slug('Chaussures'),
                'parent_id' => 18,
            ],

            [
                'name' =>  'Baskets',
                'slug' => Str::slug('Baskets'),
                'parent_id' => 42,
            ],

            [
                'name' =>  'Nike',
                'slug' => Str::slug('Nike'),
                'parent_id' => 43,
            ],

            [
                'name' =>  'Chemises',
                'slug' => Str::slug('Chemises'),
                'parent_id' => 18,
            ],

        ];

        foreach ($categories as $category) {
            $new_category = Category::create($category);
        }
    }
}
