<?php

namespace App\Factories;

use App\Infrastructure\Model\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $faker = Faker::create();
        return [
            'email' => $faker->unique()->safeEmail(),
            'password' => $faker->password(),
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
        ];
    }
}
