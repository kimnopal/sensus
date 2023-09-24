<?php

namespace Database\Factories;

use App\Models\Agama;
use App\Models\AkseptorKB;
use App\Models\HubunganKeluarga;
use App\Models\Keluarga;
use App\Models\Suku;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IndividuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $keluarga = Keluarga::all(["no_kk"]);
        $agama = Agama::all();
        $hubunganKeluarga = HubunganKeluarga::all();
        $akseptorKB = AkseptorKB::all();
        $suku = Suku::all();

        return [
            "nama" => fake("id_ID")->name(),
            "nik" => fake("id_ID")->nik(),
            "no_kk" => $keluarga->random(1)->first()->no_kk,
            "jenis_kelamin" => ["laki-laki", "perempuan"][array_rand(["laki-laki", "perempuan"])],
            "tempat_lahir" => fake()->city(),
            "tanggal_lahir" => fake()->date(),
            "agama_id" => $agama->random(1)->first()->id,
            "golongan_darah" => ["o", "a", "b", "ab"][array_rand(["o", "a", "b", "ab"])],
            "hubungan_keluarga_id" => $hubunganKeluarga->random(1)->first()->id,
            "akseptor_kb_id" => $akseptorKB->random(1)->first()->id,
            "suku_id" => $suku->random(1)->first()->id,
            "nama_ortu" => fake("id_ID")->name(),
            "warganegara" => ["wni", "wna"][array_rand(["wni", "wna"])],
            "no_hp" => fake("id_ID")->phoneNumber(),
            "no_wa" => fake("id_ID")->phoneNumber(),
            "email" => fake("id_ID")->email(),
            "facebook" => fake("id_ID")->userName(),
            "twitter" => fake("id_ID")->userName(),
            "instagram" => fake("id_ID")->userName(),
        ];
    }
}
