<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $attributes = ["size", "gender", "color"];
        $filepath = '/images/products/tshirt1.jpg';
        // Create Product
        $product = \Stripe\Product::create(array(
          "name" => 'T-shirt1',
          "description" => 'This is a t-shirt',
          "attributes" => $attributes,
          "metadata" => [
            "img_path" => $filepath
            ]
        ));

    }
}
