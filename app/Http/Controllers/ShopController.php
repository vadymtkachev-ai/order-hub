<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index(): View
    {
        $shops = Shop::all();

        return view('shops.index', ['shops' => $shops]);
    }
}
