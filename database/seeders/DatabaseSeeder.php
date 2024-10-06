<?php

namespace Database\Seeders;

use App\Models\Contractor;
use App\Models\Order;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Сначала создаем пользователей
        $users = User::factory(3)->create();

        // Затем создаем контрагентов для каждого пользователя
        foreach ($users as $user) {
            $contractors = Contractor::factory(10)->create(['user_id' => $user->id]); // Сохраняем контрагентов
            // Отладочное сообщение
            echo "Created " . $contractors->count() . " contractors for User ID: {$user->id}\n";

            // Создаем заказы для каждого пользователя
            for ($i = 1; $i <= 50; $i++) {
                // Проверяем наличие контрагентов
                if ($contractors->isNotEmpty()) {
                    $contractor = $contractors->random(); // Получаем случайного контрагента
                    Order::factory()->create([
                        'user_id' => $user->id,
                        'user_order_id' => $i, // Инкрементируем для каждого заказа
                        'contractor_id' => $contractor->id, // Используем случайного контрагента
                    ]);
                } else {
                    // Создаем заказ без контрагента
                    Order::factory()->create([
                        'user_id' => $user->id,
                        'user_order_id' => $i,
                        'contractor_id' => null, // Контрагент не задан
                    ]);
                }
            }
        }
    }
}
