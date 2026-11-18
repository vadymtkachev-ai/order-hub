<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Data\ShopData;
use App\Enums\ShopStatus;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        $shops = [
            new ShopData('Coffee Beans', 'https://coffee-beans.example', ShopStatus::Active),
            new ShopData('World of tea', 'https://world-of-tea.example', ShopStatus::Paused),
            new ShopData('Sweets', 'https://sweets.example', ShopStatus::Active),
        ];

        return view('shops.index', ['shops' => $shops]);
    }
}
