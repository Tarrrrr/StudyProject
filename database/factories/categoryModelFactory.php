<?php

namespace Database\Factories;

use App\Models\phoneBaseModels\categoryModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<categoryModel>
 */
class categoryModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //создание фейковой категории
            'title'=>$this->faker->word,
        ];
    }
}
