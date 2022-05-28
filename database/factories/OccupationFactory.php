<?php

namespace Database\Factories;

use App\Models\Occupation;
use Illuminate\Database\Eloquent\Factories\Factory;

class OccupationFactory extends Factory
{
    protected $model = Occupation::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ip' => $this->faker->ipv4(),
            'user_agent' => $this->faker->chrome(),
        ];
    }
}
