<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            ['name' => 'Nike', 'address' => '100 Bowery, New York, NY 10013'],
            ['name' => 'Apple', 'address' => '1 Infinite Loop, Cupertino, CA 95014'],
            ['name' => 'Nestlé', 'address' => 'Avenue Nestlé 55, Vevey, CH-1800'],
        ];

        foreach ($providers as $provider) {
            \App\Models\Provider::create($provider);
        }
    }
}
