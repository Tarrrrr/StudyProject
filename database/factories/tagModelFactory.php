<?php

namespace Database\Factories;

use App\Models\phoneBaseModels\tagModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<tagModel>
 */
class tagModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //создание фейковых тегов
            'tag'=>$this->faker->word,
        ];
    }
}
