<?php

namespace Database\Factories;

use App\Models\TagModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TagModel>
 */
class TagModelFactory extends Factory
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
