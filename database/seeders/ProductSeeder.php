<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Nike
            ['provider_id' => 1, 'store_id' => 1, 'group_id' => 1, 'title' => 'Air Jordan 1 High OG', 'description' => 'The iconic Air Jordan 1 High OG in white and red.', 'sku' => 'AJ1100'],
            ['provider_id' => 1, 'store_id' => 1, 'group_id' => 1, 'title' => 'Nike Air Max 90', 'description' => 'The classic Nike Air Max 90 in black and white.', 'sku' => 'AM9000'],
            ['provider_id' => 1, 'store_id' => 1, 'group_id' => 1, 'title' => 'Nike Air Force 1 Low', 'description' => 'The iconic Nike Air Force 1 Low in white and black.', 'sku' => 'AF1000'],

            // Apple
            ['provider_id' => 2, 'store_id' => 2, 'group_id' => 2, 'title' => 'iPhone 14 Pro Max', 'description' => 'The new iPhone 14 Pro Max with the best processor and camera on the market.', 'sku' => 'IP1400'],
            ['provider_id' => 2, 'store_id' => 2, 'group_id' => 2, 'title' => 'iPad Pro (2023)', 'description' => 'The new iPad Pro tablet with the best processor and display on the market.', 'sku' => 'IPD2000'],
            ['provider_id' => 2, 'store_id' => 2, 'group_id' => 2, 'title' => 'MacBook Air (2023)', 'description' => 'The new MacBook Air with the best processor and display on the market.', 'sku' => 'MB2000'],

            // Nestlé
            ['provider_id' => 3, 'store_id' => 3, 'group_id' => 3, 'title' => 'Nestlé KitKat', 'description' => 'The iconic KitKat chocolate with its chocolate and wafer flavor.', 'sku' => 'NKT000'],
            ['provider_id' => 3, 'store_id' => 3, 'group_id' => 3, 'title' => 'Nestlé Nescafé', 'description' => 'The Nescafé instant coffee with its intense and creamy flavor.', 'sku' => 'NFC000'],
            ['provider_id' => 3, 'store_id' => 3, 'group_id' => 3, 'title' => 'Nestlé Nesquik', 'description' => 'The Nesquik chocolate powder with its delicious and nutritious flavor.', 'sku' => 'NQK000'],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
