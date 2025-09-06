<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest; // See REQ-003
use Domain\Orders\Actions\CreateOrderAction;
use Domain\Orders\Data\CreateOrderData;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request, CreateOrderAction $createOrder)
    {
        $orderData = CreateOrderData::from([
            ...$request->validated(),
            'user_id' => auth()->id(),
        ]);

        $order = $createOrder($orderData);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order created successfully.');
    }
}
