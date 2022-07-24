<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $this->call(UserSeeder::class);
        Admin::factory(1)->create();

        /* $randArray = [null, null, null, null, 1, 1, 1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9, 10, 10];

        Category::factory(300)->create()->each(function ($category) use ($randArray, $faker) {
            $category->name = ucfirst($faker->word());
            $category->parent_id = $randArray[rand(0, count($randArray) - 1)];
            $category->save();
        }); */
        $this->call(FontAwesomeIconSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(WeightSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(ProductOptionSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductReviewSeeder::class);
        $this->call(GeneralWebsiteSettingsSeeder::class);
        /*  $this->call(ProductVariantSeeder::class); */
    }
}
