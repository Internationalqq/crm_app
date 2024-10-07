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

        // Устанавливаем значения по умолчанию, если поля пустые
        $data['manager'] = $data['manager'] ?: 'Стандартный менеджер'; // Установите ваше значение по умолчанию
        $data['order_type'] = $data['order_type'] ?: 'Платный'; // Установите ваше значение по умолчанию
        $data['device_type'] = $data['device_type'] ?: 'Неизвестный'; // Установите ваше значение по умолчанию
        $data['device'] = $data['device'] ?: 'Неизвестное устройство'; // Установите ваше значение по умолчанию
        $data['issue'] = $data['issue'] ?: 'Нет информации'; // Установите ваше значение по умолчанию

        // $data = $request->validated();
        // $this->service->store($data);


        // return redirect()->route('order.index')->with('success', 'Заказ создан успешно!');

        // Валидация данных
        $validatedData = $request->validated();

        // Проверка и создание нового контрагента, если указаны данные
        if ($request->filled('new_contractor_title') && $request->filled('new_contractor_phone')) {
            $contractor = new Contractor();
            $contractor->title = $request->new_contractor_title;
            $contractor->contractor_phone = $request->new_contractor_phone;
            $contractor->user_id = Auth::id(); // Устанавливаем user_id
            $contractor->save();

            // Сохраняем ID нового контрагента
            $validatedData['contractor_id'] = $contractor->id;
        }

        // Передаем данные в сервис для создания заказа
        $this->service->store($validatedData);
        dd($data);

        return redirect()->route('order.index')->with('success', 'Заказ создан успешно!');
    }
}
