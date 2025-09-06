<?php

namespace Domain\Orders\Actions;

use Domain\Orders\Data\CreateOrderData;
use Domain\Orders\Models\Order;
use Domain\Products\Models\Product;
use Illuminate\Support\Facades\DB;

class CreateOrderAction
{
    public function __invoke(CreateOrderData $data): Order
    {
        return DB::transaction(function () use ($data) {
            $product = Product::findOrFail($data->product_id);

            if ($product->stock < $data->quantity) {
                throw new \Exception('Not enough stock.');
            }

            $order = Order::create([
                'user_id' => $data->user_id,
                'total_price' => $product->price * $data->quantity,
            ]);

            $product->decrement('stock', $data->quantity);

            return $order;
        });
    }
}
