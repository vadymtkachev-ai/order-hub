<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Shop;
use App\Enums\ShopStatus;

class ShopController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->enum('status', ShopStatus::class);

        $shops = Shop::query()
            ->when($status, fn(Builder $query) => $query->where('status', $status))
            ->get();

        return view('shops.index', ['shops' => $shops]);
    }
}
