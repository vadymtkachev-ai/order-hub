<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ShopStatus;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;

class Shop extends Model
{
    protected $fillable = ['name', 'url', 'status'];

    protected function casts(): array
    {
        return [
            'status' => ShopStatus::class,
        ];
    }

    #[Scope]
    protected function active(Builder $query): void
    {
        $query->where('status', ShopStatus::Active);
    }
}
