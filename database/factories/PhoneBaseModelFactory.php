<?php

namespace Database\Factories;

use App\Models\CategoryModel;
use App\Models\PhoneBaseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PhoneBaseModel>
 */
class PhoneBaseModelFactory extends Factory
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
            'phone'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->address(),
            'birthday'=>$this->faker->date(),
            'country'=>$this->faker->country(),
            'category_id'=> CategoryModel::get()->random()->id,
        ];
    }
}
