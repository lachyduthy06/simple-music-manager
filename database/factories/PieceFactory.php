<?php

namespace Database\Factories;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Piece>
 */
class PieceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'collection_id' => Collection::factory(),
            'name' => fake()->words(3, true),
            'artist' => fake()->name(),
            'lyrics_link' => fake()->optional(0.8)->url(),
            'tutorial_link' => fake()->optional()->url(),
            'notes' => fake()->optional()->paragraph(),
            'sort' => fake()->numberBetween(0, 100),
        ];
    }
}
