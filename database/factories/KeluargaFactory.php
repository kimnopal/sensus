<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keluarga>
 */
class KeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'provinsi' => 'jawa barat',
            'kabupaten' => 'pangandaran',
            'kecamatan' => 'cijulang',
            'desa' => 'batukaras',
            'no_kk' => fake()->numerify('##########'),
            'dusun_id' => rand(1, 5),
            'rt_id' => rand(1, 5),
            'rw_id' => rand(1, 5),
            "step" => "permukiman",
        ];
    }
}
