<?php

namespace Database\Factories;

use App\Models\phoneBaseModels\categoryModel;
use App\Models\phoneBaseModels\phoneBaseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<phoneBaseModel>
 */
class phoneBaseModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //создание фейковых контактов
            'name'=>$this->faker->name(),
            'phoneBaseViews'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->address(),
            'birthday'=>$this->faker->date(),
            'country'=>$this->faker->country(),
            'category_id'=> categoryModel::get()->random()->id,
        ];
    }
}
