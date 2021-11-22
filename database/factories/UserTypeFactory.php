<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\UserType;

class UserTypeFactory extends Factory {

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        /* return [
          'user_type_name' => $this->faker->name,
          'status' => $this->faker->boolean,
          'description' => $this->faker->paragraph
          ]; */
    }

}
