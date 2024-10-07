<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\StoreRequest;
use App\Models\Contractor;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        // Получаем данные из запроса
        $data = $request->all();

        // Проверка и создание нового контрагента, если указаны данные
        if ($request->filled('new_contractor_title') && $request->filled('new_contractor_phone')) {
            $contractor = new Contractor();
            $contractor->title = $request->new_contractor_title;
            $contractor->contractor_phone = $request->new_contractor_phone;
            $contractor->user_id = Auth::id(); // Устанавливаем user_id
            $contractor->save();

            // Сохраняем ID нового контрагента в $data
            $data['contractor_id'] = $contractor->id; // Используем $data, чтобы сохранить contractor_id
        }

        // Валидация данных
        $validatedData = $request->validated();

        // Объединяем $data с $validatedData
        $data = array_merge($validatedData, $data);

        // Удаляем поля new_contractor_title и new_contractor_phone из массива $data
        unset($data['new_contractor_title']);
        unset($data['new_contractor_phone']);

        // Передаем данные в сервис для создания заказа
        $this->service->store($data);

        return redirect()->route('order.index')->with('success', 'Заказ создан успешно!');
    }
}


        // $data = $request->validated();
        // $this->service->store($data);


        // return redirect()->route('order.index')->with('success', 'Заказ создан успешно!');