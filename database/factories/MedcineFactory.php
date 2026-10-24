<?php

namespace Database\Factories;

use App\Models\Medcine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Medcine>
 */
class MedcineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'telephone' => $this->faker->phoneNumber(),
            'tarif' => $this->faker->randomFloat(2, 50, 200),
            'specialite_id' => \App\Models\Specialite::factory(),
        ];
    }
}
