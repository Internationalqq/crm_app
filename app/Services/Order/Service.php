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

        // Устанавливаем значения по умолчанию, если поля пустые
        $data['due_date'] = $data['due_date'] ?: date("Y-m-d"); // Установите ваше значение по умолчанию
        $data['manager'] = $data['manager'] ?: '-'; // Установите ваше значение по умолчанию
        $data['order_type'] = $data['order_type'] ?: "Платный"; // Установите ваше значение по умолчанию
        $data['device_type'] = $data['device_type'] ?: '-'; // Установите ваше значение по умолчанию
        $data['device'] = $data['device'] ?: '-'; // Установите ваше значение по умолчанию
        $data['issue'] = $data['issue'] ?: '-'; // Установите ваше значение по умолчанию
        $data['amount'] = $data['amount'] ?: 0; // Установите ваше значение по умолчанию

        // Устанавливаем user_id и user_order_id
        $data['user_id'] = Auth::id();
        $lastOrderNumber = Order::where('user_id', $data['user_id'])->max('user_order_id');
        $data['user_order_id'] = $lastOrderNumber ? $lastOrderNumber + 1 : 1;

        // Создаем заказ
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
