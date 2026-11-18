<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ShopStatus;

class Shop extends Model
{
    protected $fillable = ['name', 'url', 'status'];

    protected function casts(): array
    {
        return [
            'status' => ShopStatus::class,
        ];
    }
}
