<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PendidikanKeluarga>
 */
class PendidikanKeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "anak_bersekolah" => ["ada", "tidak"][array_rand(["ada", "tidak"])],
            "anak_putus_sekolah" => ["ada", "tidak"][array_rand(["ada", "tidak"])],
            "buta_huruf" => ["ada", "tidak"][array_rand(["ada", "tidak"])],
        ];
    }
}
