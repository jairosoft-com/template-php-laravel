<?php

namespace Domain\Orders\Data;

use Spatie\LaravelData\Data;

class CreateOrderData extends Data
{
    public function __construct(
        public readonly int $product_id,
        public readonly int $quantity,
        public readonly int $user_id,
    ) {}
}
