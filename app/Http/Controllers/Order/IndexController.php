<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\FilterRequest;
use App\Models\Contractor;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {

        // Получаем данные из запроса
        $search = $request->input('search'); // Получаем значение из поля поиска
        $status = $request->input('status'); // Получаем статус из запроса


        // Инициализируем запрос для заказов пользователя
        $query = Order::where('user_id', Auth::id());

        // Если есть запрос на поиск, фильтруем по всем полям
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('status', 'like', "%{$search}%")
                    ->orWhere('manager', 'like', "%{$search}%")
                    ->orWhere('order_type', 'like', "%{$search}%")
                    ->orWhere('device_type', 'like', "%{$search}%")
                    ->orWhere('device', 'like', "%{$search}%")
                    ->orWhere('issue', 'like', "%{$search}%")
                    ->orWhere('amount', 'like', "%{$search}%");
            });
        }

        // Фильтрация по статусу, если статус передан
        if ($status) {
            if ($status === 'in_progress') {
                $query->where('status', 0); // Заказы в работе
            } elseif ($status === 'completed') {
                $query->where('status', 1); // Выполненные заказы
            }
        }

        // Получаем отфильтрованные заказы
        $orders = $query->orderBy('id', 'desc')->get();
        $contractors = Contractor::all();

        return view('order.index', compact('orders', 'contractors'));
    }
}
