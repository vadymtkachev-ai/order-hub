<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\ShopStatus;

final readonly class ShopData
{
    public function __construct(
        public string     $name,
        public string     $url,
        public ShopStatus $status
    )
    {
    }
}
