<?php

namespace Database\Factories;

use App\Models\JenisAtap;
use App\Models\JenisDinding;
use App\Models\JenisEnergiMemasak;
use App\Models\JenisLantai;
use App\Models\JenisPenerangan;
use App\Models\PembuanganLimbah;
use App\Models\StatusLahan;
use App\Models\StatusRumah;
use App\Models\SumberAirMandi;
use App\Models\SumberAirMinum;
use App\Models\SumberKayu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PermukimanKeluarga>
 */
class PermukimanKeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statusRumah = StatusRumah::all();
        $statusLahan = StatusLahan::all();
        $jenisLantai = JenisLantai::all();
        $jenisDinding = JenisDinding::all();
        $jenisAtap = JenisAtap::all();
        $jenisPenerangan = JenisPenerangan::all();
        $jenisEnergiMemasak = JenisEnergiMemasak::all();
        $sumberKayu = SumberKayu::all();
        $sumberAirMandi = SumberAirMandi::all();
        $sumberAirMinum = SumberAirMinum::all();
        $pembuanganLimbah = PembuanganLimbah::all();

        return [
            "status_rumah_id" => $statusRumah->random(1)->first()->id,
            "status_lahan_id" => $statusLahan->random(1)->first()->id,
            "luas_lantai" => 100,
            "luas_lahan" => 100,
            "jenis_lantai_id" => $jenisLantai->random(1)->first()->id,
            "jenis_dinding_id" => $jenisDinding->random(1)->first()->id,
            "status_jendela" => ["berfungsi", "tidak berfungsi", "tidak ada"][array_rand(["berfungsi", "tidak berfungsi", "tidak ada"])],
            "jenis_atap_id" => $jenisAtap->random(1)->first()->id,
            "jenis_penerangan_id" => $jenisPenerangan->random(1)->first()->id,
            "jenis_energi_memasak_id" => $jenisEnergiMemasak->random(1)->first()->id,
            "sumber_kayu_id" => $sumberKayu->random(1)->first()->id,
            "tempat_pembuangan_sampah" => ["tidak ada", "di kebun/sungai/drainase", "dibakar", "tempat sampah", "tempat sampah diangkut reguler"][array_rand(["tidak ada", "di kebun/sungai/drainase", "dibakar", "tempat sampah", "tempat sampah diangkut reguler"])],
            "fasilitas_mck" => ["sendiri", "berkelompok/tetangga", "mck umum", "tidak ada"][array_rand(["sendiri", "berkelompok/tetangga", "mck umum", "tidak ada"])],
            "sumber_air_mandi_id" => $sumberAirMandi->random(1)->first()->id,
            "fasilitas_bab" => ["jamban sendiri", "jamban bersama/tetangga", "mck umum", "tidak ada"][array_rand(["jamban sendiri", "jamban bersama/tetangga", "mck umum", "tidak ada"])],
            "sumber_air_minum_id" => $sumberAirMinum->random(1)->first()->id,
            "pembuangan_limbah_id" => $pembuanganLimbah->random(1)->first()->id,
            "rumah_dibawah_sutet" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "rumah_dibantaran_sungai" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "rumah_dilereng" => ["ya", "tidak"][array_rand(["ya", "tidak"])],
            "kondisi_rumah" => ["kumuh", "tidak kumuh"][array_rand(["kumuh", "tidak kumuh"])],
        ];
    }
}
