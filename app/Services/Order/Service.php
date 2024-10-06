<?php

namespace App\Services\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Service
{

    public function store($data)
    {
        // $tags = $data['tags'];
        // unset($data['tags']);

        $data['user_id'] = Auth::id();
        $lastOrderNumber = Order::where('user_id', $data['user_id'])->max('user_order_id');
        $data['user_order_id'] = $lastOrderNumber ? $lastOrderNumber + 1 : 1;
        $order = Order::create($data);

        // $order->tags()->attach($tags);
    }

    public function update($data, $order)
    {
        // $tags = $data['tags'];
        // unset($data['tags']);
        if ($order->user_id != Auth::id()) {
            abort(403, 'У вас нет прав для редактирования этого заказа.');
        }

        $order->update($data);
        // $order->tags()->sync($tags);
    }
}
