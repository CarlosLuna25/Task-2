<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productPrices = [
            // Nike Air Jordan 1 
            ['product_id' => 1, 'store_id' => 1, 'price' => 150],

            // Nike Air
            ['product_id' => 2, 'store_id' => 1, 'price' => 100],

            //nike
            ['product_id' => 3, 'store_id' => 1, 'price' => 80],

            // iPhone 14 Pro Max 
            ['product_id' => 4, 'store_id' => 2, 'price' => 1000],

            // iPad Pro (2023) on Apple.com
            ['product_id' => 5, 'store_id' => 2, 'price' => 800],

            // MacBook Air (2023) on Nestlé.com
            ['product_id' => 6, 'store_id' => 2, 'price' => 600],

            // Nestlé KitKat on Nike.com
            ['product_id' => 7, 'store_id' => 3, 'price' => 2],

            // Nestlé Nescafé on Apple.com
            ['product_id' => 8, 'store_id' => 3, 'price' => 3],

            // Nestlé Nesquik on Nestlé.com
            ['product_id' => 9, 'store_id' => 3, 'price' => 1],
        ];

        foreach ($productPrices as $productPrice) {
            \App\Models\product_price::create($productPrice);
        }
    }
}
