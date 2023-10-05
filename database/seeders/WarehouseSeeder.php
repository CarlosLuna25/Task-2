<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Create some warehouses
          $warehouses = [
            ['name' => 'Central Warehouse', 'address' => '123 Main Street, Anytown, CA 91234'],
            ['name' => 'Distribution Warehouse', 'address' => '456 Elm Street, Anytown, CA 91234'],
            ['name' => 'Store Warehouse', 'address' => '789 Oak Street, Anytown, CA 91234'],
        ];

        foreach ($warehouses as $warehouse) {
            \App\Models\Warehouse::create($warehouse);
        }
    }
}
