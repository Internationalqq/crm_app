<?php

namespace Database\Factories;

use App\Models\Contractor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => fake()->randomElement([0, 1]),
            'due_date' => fake()->date(),
            'manager' => fake()->randomElement(['Коробицын Матвей', 'Филиппов Андрей']),
            'order_type' => fake()->randomElement(['Платный']),
            'device_type' => fake()->randomElement(['Черный', 'Белый', 'Красный', 'Зелый', 'Синий', 'Лавандовый']),
            'device' => fake()->randomElement(['Iphone 11', 'Xiaomi 10', 'Samsung Galaxy S21', 'Samsung Galaxy S20', 'OPPO Reno 8 5G', 'OPPO Reno 8 5G', 'OPPO Reno 8 5G', 'OPPO Reno 8 5G', 'OPPO Reno 8 5G']),
            'issue' => fake()->randomElement(['Разбит экран', 'Нет звука', 'Замена АКБ', 'Не ловит сеть', 'Утоплен', 'Замена матрицы', 'Замена аудиокодека', 'Сломался', 'Нет батареи', 'Прочее']),
            'contractor_id' => null,
            'user_id' => User::get()->random()->id,
            // 'user_order_id' => null,  // Увеличиваем порядковый номер
            'amount' => fake()->numberBetween(500, 20000),
        ];
    }
}
