<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

    public function create(Request $request)
    {
        return view('shops.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:255', Rule::unique('shops', 'url')],
            'status' => ['required', Rule::enum(ShopStatus::class)],
        ]);


        Shop::create($validated);

        return redirect()->route('shops.index')->with('success', 'Shop created!');
    }

    public function edit(Shop $shop): View
    {
        return view('shops.edit', compact('shop'));
    }

    public function update(Request $request, Shop $shop): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:255', Rule::unique('shops', 'url')->ignore($shop)],
            'status' => ['required', Rule::enum(ShopStatus::class)],
        ]);

        $shop->update($validated);

        return redirect()->route('shops.index')->with('success', 'Shop updated!');
    }
}
