<?php

namespace Database\Factories;

use App\Models\Individu;
use App\Models\PekerjaanUtama;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PekerjaanIndividu>
 */
class PekerjaanIndividuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kondisiPekerjaan = DB::table("kondisi_pekerjaan")->get();
        $pekerjaanUtama = PekerjaanUtama::all();

        $statusJamsostek = ["peserta", "bukan peserta"][array_rand(["peserta", "bukan peserta"])];

        return [
            "kondisi_pekerjaan_id" => $kondisiPekerjaan->random(1)->first()->id,
            "pekerjaan_utama_id" => $pekerjaanUtama->random(1)->first()->id,
            "status_jamsostek" => $statusJamsostek,
            "no_jamsostek" => $statusJamsostek == "peserta" ? fake()->numerify('##########') : "",
            "gaji" => fake()->numerify('#######')
        ];
    }
}
