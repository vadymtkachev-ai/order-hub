<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;
use App\Enums\ShopStatus;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::create(['name' => 'Coffee Beans', 'url' => 'https://coffee-beans.example', 'status' => ShopStatus::Active]);

        Shop::create(['name' => 'World of tea', 'url' => 'https://world-of-tea.example', 'status' => ShopStatus::Paused]);

        Shop::create(['name' => 'Sweets', 'url' => 'https://sweets.example', 'status' => ShopStatus::Active]);
    }
}
