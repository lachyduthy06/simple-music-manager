<?php

namespace Database\Factories;

use App\Models\Instrument;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'instrument_id' => Instrument::factory(),
            'name' => fake()->words(2, true),
            'sort' => fake()->numberBetween(0, 100),
        ];
    }
}
