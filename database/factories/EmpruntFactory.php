<?php

namespace Database\Factories;

use App\Models\Liver;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprunt>
 */
class EmpruntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "date_emprunt" => fake()->dateTimeBetween("-1 year"),
            "date_retour" => fake()->dateTimeBetween("+1 month", "+2 months"),
            "liver_id" => Liver::all()->random()->id
        ];
    }
}
