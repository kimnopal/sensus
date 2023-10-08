<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KesehatanKeluarga>
 */
class KesehatanKeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "keluarga_posyandu" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "bayi_gizi_baik" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "lansia_posyandu" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "keluarga_jaskesmas" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "pus_kb" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "pus_tidak_kb" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "keluarga_bkb" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "keluarga_bkr" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "keluarga_bkl" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "keluarga_uppks" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "peserta_paguyuban" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "remaja_pikr" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "remaja_saka_kencana" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "blt" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "pkh" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "bst" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "banpres" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "bantuan_umkm" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "bantuan_pekerja" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "bantuan_pendidikan" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "bantuan_listrik" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "manfaat_pekarangan" => ["ada", "tidak"][array_rand(["ada", "tidak"])],
            "keluarga_tani" => ["ada", "tidak"][array_rand(["ada", "tidak"])],
            "keluarga_rukun_nelayan" => ["ada", "tidak"][array_rand(["ada", "tidak"])],
        ];
    }
}
