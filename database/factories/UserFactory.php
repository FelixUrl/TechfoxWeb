<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'isAdmin' => $this->faker->boolean(10),
            'ban' => $this->faker->boolean(5),
            'login' => $this->faker->unique()->userName(),
            'phone' => $this->faker->phoneNumber(),
            'avatar' => 'default-avatar.jpg',
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // password
            'key' => md5(time() . mt_rand(0, 4192) . uniqid()),
        ];
    }
}
