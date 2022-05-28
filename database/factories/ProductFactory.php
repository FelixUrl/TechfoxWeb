<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Стекло', 'Экран', 'Камера', 'Сенсор', 'Батарея', 'Корпус', 'Динамик', 'Радар']),
            'description' => $this->faker->randomElement(['Запчасть', 'Деталь']),
            'photo' => 'original.jpg',
            'weight' => $this->faker->numberBetween(10, 100),
            'category_id' => $this->faker->numberBetween(1, 3),
            'type_technic_id' => $this->faker->numberBetween(1, 3),
            'mark_id' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(1000, 60000),
        ];
    }
}
