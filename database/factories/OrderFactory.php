<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Сломался ' . strtolower($this->faker->randomElement(['Стекло', 'Экран', 'Камера', 'Сенсор', 'Батарея', 'Корпус', 'Динамик', 'Радар'])),
            'description' => 'Нужна ' . $this->faker->randomElement(['Запчасть', 'Деталь']),
            'user_id' => $user = User::all()->random()->id,
            'category_id' => $this->faker->numberBetween(1, 3),
            'status_id' => $this->faker->numberBetween(1, 3),
            'type_technic_id' => $this->faker->numberBetween(1, 3),
            'mark_id' => $this->faker->numberBetween(1, 10),
            'phone' => User::where('id', $user)->first()->phone,
        ];
    }
}
