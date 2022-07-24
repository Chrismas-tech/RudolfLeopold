<?php

namespace Database\Seeders;

use App\Helpers\VariantsHelpers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOptionPivot;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_id = 43;
        $currency_id = 1;
        $products = [

            [
                'name' => 'Nike',
                'slug' => Str::slug('Nike'),
                'type' => 1,
                'category_id' => $category_id,
                'category_name' => Category::findorfail($category_id)->name,
                'sku' => uniqid(),
                'qty' => random_int(0, 200),
                'selling_price' => 3000,
                'currency_id' => $currency_id,
                'discount_percent' => 5,
                'tags' => serialize(["Basket", "Nike"]),
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'long_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'visible' => true,
                'variant' => false,
                'weight' => 0,
                'weight_id' => random_int(1, 2),
                'hot_deals' => true,
                'special_offer' => true,
                'featured' => true,
                'special_deals' => true,
            ],

            [
                'name' => 'Puma',
                'slug' => Str::slug('Puma'),
                'category_id' => $category_id,
                'category_name' => Category::findorfail($category_id)->name,
                'sku' => uniqid(),
                'qty' => random_int(0, 200),
                'selling_price' => 3000,
                'currency_id' => $currency_id,
                'discount_percent' => 5,
                'type' => 1,
                'tags' => serialize(["Basket", "Nike"]),
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'long_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'visible' => true,
                'variant' => false,
                'weight' => 0,
                'weight_id' => random_int(1, 2),
                'hot_deals' => true,
                'special_offer' => true,
                'featured' => true,
                'special_deals' => true,
            ],

            [
                'name' => 'GoSport',
                'slug' => Str::slug('GoSport'),
                'category_id' => $category_id,
                'category_name' => Category::findorfail($category_id)->name,
                'sku' => uniqid(),
                'qty' => random_int(0, 200),
                'selling_price' => 3000,
                'currency_id' => $currency_id,
                'discount_percent' => 5,
                'type' => 1,
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'long_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'tags' => serialize(["Basket", "Nike"]),
                'visible' => true,
                'variant' => false,
                'weight' => 0,
                'weight_id' => random_int(1, 2),
                'hot_deals' => true,
                'special_offer' => true,
                'featured' => true,
                'special_deals' => true,
            ],

        ];

        foreach ($products as $product) {
            $new_product = Product::create($product);
            /* ProductCategories::create([
                'category_id' => $category_id,
                 'category_name' => Category::findorfail(43)->name,
                 'sku' => uniqid(),
                 'qty' => random_int(0,200),
                 'selling_price' => 3000,
                     'currency_id' => $currency_id,
                 'discount_percent' => 5, 
                'id' => $new_product
            ]); */
        }

        $category_id = 33;

        $products = [

            [
                'name' => 'Le royaume de feu T1',
                'slug' => Str::slug('Le royaume de feu T1'),
                'category_id' => $category_id,
                'category_name' => Category::findorfail(43)->name,
                'sku' => uniqid(),
                'qty' => random_int(0, 200),
                'selling_price' => 3000,
                'currency_id' => $currency_id,
                'discount_percent' => 5,
                'type' => 1,
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'long_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'tags' => serialize(["Livres", "Le royaume de feu T1"]),
                'visible' => true,
                'variant' => false,
                'weight' => 0,
                'weight_id' => random_int(1, 2),
                'hot_deals' => true,
                'special_offer' => true,
                'featured' => true,
                'special_deals' => true,
            ],

            [
                'name' => 'Le royaume de feu T2',
                'slug' => Str::slug('Le royaume de feu T2'),
                'category_id' => $category_id,
                'category_name' => Category::findorfail(43)->name,
                'sku' => uniqid(),
                'qty' => random_int(0, 200),
                'selling_price' => 3000,
                'currency_id' => $currency_id,
                'discount_percent' => 5,
                'type' => 1,
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'long_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'tags' => serialize(["Livres", "Le royaume de feu T2"]),
                'visible' => true,
                'variant' => false,
                'weight' => 0,
                'weight_id' => random_int(1, 2),
                'hot_deals' => true,
                'special_offer' => true,
                'featured' => true,
                'special_deals' => true,
            ],

            [
                'name' => 'Le royaume de feu T3',
                'slug' => Str::slug('Le royaume de feu T3'),
                'category_id' => $category_id,
                'category_name' => Category::findorfail(43)->name,
                'sku' => uniqid(),
                'qty' => random_int(0, 200),
                'selling_price' => 3000,
                'currency_id' => $currency_id,
                'discount_percent' => 5,
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'long_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'type' => 1,
                'tags' => serialize(["Livres", "Le royaume de feu T3"]),
                'visible' => true,
                'variant' => false,
                'weight' => 0,
                'weight_id' => random_int(1, 2),
                'hot_deals' => true,
                'special_offer' => true,
                'featured' => true,
                'special_deals' => true,
            ],

        ];



        $category_id = 2;

        $products = [

            [
                'name' => 'Chemise Ete',
                'slug' => Str::slug('Chemise Ete'),
                'category_id' => 45,
                'category_name' => Category::findorfail($category_id)->name,
                'sku' => null,
                'qty' => random_int(0, 200),
                'selling_price' => null,
                'currency_id' => $currency_id,
                'discount_percent' => 0,
                'type' => 1,
                'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'long_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'tags' => serialize(["Vêtements", "Homme", "Chemises", "chemise été"]),
                'visible' => true,
                'variant' => true,
                'weight' => 0,
                'weight_id' => random_int(1, 2),
                'hot_deals' => true,
                'special_offer' => true,
                'featured' => true,
                'special_deals' => true,
            ],
        ];

        foreach ($products as $product) {

            $new_product = Product::create($product);

            // Prepare Combinations
            $combination_variants = VariantsHelpers::combination_all_variants([1, 2]);

            for ($i = 1; $i < 3; $i++) {
                ProductOptionPivot::create(
                    [
                        'product_id' => $new_product->id,
                        'product_option_id' => $i,
                    ]
                );
            }


            // Create All Product Variants
            if (count($combination_variants)) {
                foreach ($combination_variants as $value) {
                    ProductVariant::create(
                        [
                            'product_id' => $new_product->id,
                            'name' => $value,
                        ]
                    );
                }
            }
        }
    }
}
