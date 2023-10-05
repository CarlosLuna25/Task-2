<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inventory = [
            // Nike Air Jordan 1 High OG in Central Warehouse
            ['product_id' => 1, 'warehouses_id' => 1, 'stock' => 100],

            // Nike Air Max 90 in Distribution Warehouse
            ['product_id' => 2, 'warehouses_id' => 2, 'stock' => 50],

            // Nike Air Force 1 Low in Store Warehouse
            ['product_id' => 3, 'warehouses_id' => 3, 'stock' => 25],

            // iPhone 14 Pro Max in Central Warehouse
            ['product_id' => 4, 'warehouses_id' => 1, 'stock' => 75],

            // iPad Pro (2023) in Distribution Warehouse
            ['product_id' => 5, 'warehouses_id' => 2, 'stock' => 30],

            // MacBook Air (2023) in Store Warehouse
            ['product_id' => 6, 'warehouses_id' => 3, 'stock' => 15],

            // Nestlé KitKat in Central Warehouse
            ['product_id' => 7, 'warehouses_id' => 1, 'stock' => 1000],

            // Nestlé Nescafé in Distribution Warehouse
            ['product_id' => 8, 'warehouses_id' => 2, 'stock' => 500],

            // Nestlé Nesquik in Store Warehouse
            ['product_id' => 9, 'warehouses_id' => 3, 'stock' => 250],
        ];

        foreach ($inventory as $inventoryItem) {
            \App\Models\Inventory::create($inventoryItem);
        }
    }
}
