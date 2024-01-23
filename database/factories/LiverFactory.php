<?php

namespace Database\Factories;

use App\Models\Auteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Liver>
 */
class LiverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "titre" => fake()->sentence(5),
            "année_de_publication" => fake()->dateTimeBetween("-15 years"),
            "nbr_page" => fake()->numberBetween(10, 500),
            "auteur_id" => Auteur::all()->random()->id
        ];
    }
}
