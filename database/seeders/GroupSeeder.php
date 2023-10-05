<?php

namespace Database\Seeders;

use App\Models\product_group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create 7 product groups
         $groups = [
            ['name' => 'Clothing', 'Description' => 'Clothing products for men, women, and children'],
            ['name' => 'Electronics', 'Description' => 'Electronic products such as smartphones, computers, TVs, and more'],
            ['name' => 'Food', 'Description' => 'Food products such as fruits, vegetables, meats, seafood, and more'],
            ['name' => 'Home', 'Description' => 'Home products such as furniture, appliances, cleaning supplies, and more'],
            ['name' => 'Beauty and personal care', 'Description' => 'Beauty and personal care products such as makeup, perfumes, hair products, and more'],
            ['name' => 'Sports and recreation', 'Description' => 'Sports and recreation products such as athletic apparel, sports equipment, toys, and more'],
            ['name' => 'Other', 'Description' => 'Products that do not fit into any of the above categories'],
        ];

        foreach ($groups as $group) {
            product_group::create($group);
        }
    }
}
