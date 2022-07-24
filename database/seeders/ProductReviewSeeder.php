<?php

namespace Database\Seeders;

use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::find(1);

        $reviews = [

            [
                'user_id' => $user->id,
                'product_id' => 1,
                'rating' => rand(1, 5),
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod facere harum odio totam neque voluptatem officiis debitis quasi doloribus exercitationem laudantium, alias officia quidem aliquam distinctio accusantium accusamus a!',
                'status' => 1,
            ],


            [
                'user_id' => $user->id,
                'product_id' => 1,
                'rating' => rand(1, 5),
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod facere harum odio totam neque voluptatem officiis debitis quasi doloribus exercitationem laudantium, alias officia quidem aliquam distinctio accusantium accusamus a!',
                'status' => 1,
            ],


            [
                'user_id' => $user->id,
                'product_id' => 1,
                'rating' => rand(1, 5),
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod facere harum odio totam neque voluptatem officiis debitis quasi doloribus exercitationem laudantium, alias officia quidem aliquam distinctio accusantium accusamus a!',
                'status' => 1,
            ],


            [
                'user_id' => $user->id,
                'product_id' => 1,
                'rating' => rand(1, 5),
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod facere harum odio totam neque voluptatem officiis debitis quasi doloribus exercitationem laudantium, alias officia quidem aliquam distinctio accusantium accusamus a!',
                'status' => 1,
            ],

        ];

        foreach ($reviews as $review) {
            $new_review = ProductReview::create($review);
        }
    }
}
