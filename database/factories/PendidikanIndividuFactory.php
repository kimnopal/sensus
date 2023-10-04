<?php

namespace Database\Factories;

use App\Models\PendidikanAktif;
use App\Models\TingkatPendidikan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PendidikanIndividu>
 */
class PendidikanIndividuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tingkatPendidikan = TingkatPendidikan::all();
        $pendidikanAktif = PendidikanAktif::all();

        return [
            "tingkat_pendidikan_id" => $tingkatPendidikan->random(1)->first()->id,
            "pendidikan_aktif_id" => $pendidikanAktif->random(1)->first()->id,
            "status_baca_tulis" => "ya",
            "bahasa_normal" => "Indonesia",
            "bahasa_formal" => "Indonesia",
            "total_kerja_bakti" => 1,
            "total_siskamling" => 1,
            "total_pesta_rakyat" => 1,
            "total_menolong_kematian" => 1,
            "total_menolong_sakit" => 1,
            "total_menolong_kecelakaan" => 1,
        ];
    }
}
