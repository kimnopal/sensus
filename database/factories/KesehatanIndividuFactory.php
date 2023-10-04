<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KesehatanIndividu>
 */
class KesehatanIndividuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "status_jamsoskes" => "peserta",
            "no_jamsoskes" => "12345",
        ];
    }
}
