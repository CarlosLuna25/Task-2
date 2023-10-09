<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           // UserSeeder::class,
            GroupSeeder::class,
            ProviderSeeder::class,
            ProviderStoreSeeder::class,
            ProductSeeder::class,
            ProductPriceSeeder::class,
            WarehouseSeeder::class,
            InventorySeeder::class
        ]);
    }
}
