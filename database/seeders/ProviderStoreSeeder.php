<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providerStores = [
            ['provider_id' => 1, 'name' => 'Nike.com'],
            ['provider_id' => 2, 'name' => 'Apple.com'],
            ['provider_id' => 3, 'name' => 'Nestlé.com'],
        ];

        foreach ($providerStores as $providerStore) {
            \App\Models\provider_store::create($providerStore);
        }
    }
}
