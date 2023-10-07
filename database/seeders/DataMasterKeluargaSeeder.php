<?php

namespace Database\Seeders;

use App\Models\JenisAtap;
use App\Models\JenisDinding;
use App\Models\JenisEnergiMemasak;
use App\Models\JenisLantai;
use App\Models\JenisPendidikan;
use App\Models\JenisPenerangan;
use App\Models\PembuanganLimbah;
use App\Models\StatusLahan;
use App\Models\StatusRumah;
use App\Models\SumberAirMandi;
use App\Models\SumberAirMinum;
use App\Models\SumberKayu;
use App\Models\TataGuna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataMasterKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // status rumah
        $listStatusRumah = ["Milik Sendiri", "Kontrak/Sewa", "Bebas Sewa", "Dipinjami", "Dinas"];
        foreach ($listStatusRumah as $statusRumah) {
            StatusRumah::create(["status" => $statusRumah]);
        }

        // status lahan
        $listStatusLahan = ["Milik Sendiri", "Milik orang lain", "Tanah Negara"];
        foreach ($listStatusLahan as $statusLahan) {
            StatusLahan::create(["status" => $statusLahan]);
        }

        // jenis lantai
        $listJenisLantai = ["Marmer/granit", "Keramik", "Parket/vinil/permadani", "Ubin/tegel/teraso", "Kayu/papan kualitas tinggi", "Semen/bata merah", "Bambu", "Kayu/papan kualitas rendah"];
        foreach ($listJenisLantai as $jenisLantai) {
            JenisLantai::create(["jenis" => $jenisLantai]);
        }

        // jenis dinding
        $listJenisDinding = ["Semen/beton/kayu berkualitas tinggi", "Kayu berkualitas rendah/bambu"];
        foreach ($listJenisDinding as $jenisDinding) {
            JenisDinding::create(["jenis" => $jenisDinding]);
        }

        // jenis atap
        $listJenisAtap = ["Genteng", "Kayu/Jerami"];
        foreach ($listJenisAtap as $jenisAtap) {
            JenisAtap::create(["jenis" => $jenisAtap]);
        }

        // jenis penerangan
        $listJenisPenerangan = ["Listrik PLN", "Listrik Non PLN", "Lampu minyak/lilin", "Sumber penerangan lainnya"];
        foreach ($listJenisPenerangan as $jenisPenerangan) {
            JenisPenerangan::create(["jenis" => $jenisPenerangan]);
        }

        // tata guna
        $listTataGuna = ["Ventilasi Cukup", "Mempunyai sarana MCK", "Lantai memadai", "Berjendela dan Berdaun Pintu", "Rumah Layak Huni", "Ruang Tamu dan Keluarga Terpisah", "Ruang Tidur Terpisah (Orang Tua & Anak)", "Ada Ruang Makan", "Ada Dapur", "Terdapat Kamar Mandi"];
        foreach ($listTataGuna as $tataGuna) {
            TataGuna::create(["deskripsi" => $tataGuna]);
        }

        // jenis energi memasak
        $listJenisEnergiMemasak = ["Gas kota/LPG/biogas", "Minyak tanah/batubara", "Kayu Bakar"];
        foreach ($listJenisEnergiMemasak as $jenisEnergiMemasak) {
            JenisEnergiMemasak::create(["jenis" => $jenisEnergiMemasak]);
        }

        // sumber kayu
        $listSumberKayu = ["Pembelian", "Diambil dari hutan", "Diambil di luar/bukan hutan"];
        foreach ($listSumberKayu as $sumberKayu) {
            SumberKayu::create(["sumber" => $sumberKayu]);
        }

        // sumber air mandi
        $listSumberAirMandi = ["Ledeng/perpipaan berbayar/air isi ulang/kemasan", "Perpipaan", "Mata air/sumur", "Sungai, danau, embung", "Tadah air hujan"];
        foreach ($listSumberAirMandi as $sumberAirMandi) {
            SumberAirMandi::create(["sumber" => $sumberAirMandi]);
        }

        // sumber air minum
        $listSumberAitMinum = ["Ledeng/perpipaan berbayar/air isi ulang/kemasan", "Mata air/perpipaan/sumur", "Sungai, danau, embung", "Tadah air hujan"];
        foreach ($listSumberAitMinum as $sumberAirMinum) {
            SumberAirMinum::create(["sumber" => $sumberAirMinum]);
        }

        // pembuangan limbah
        $listPembuanganLimbah = ["Tangki/instalasi pengelolaan limbah", "Sawah/kolam/sungai/drainase/laut", "Lubang di tanah"];
        foreach ($listPembuanganLimbah as $pembuanganLimbah) {
            PembuanganLimbah::create(["tempat" => $pembuanganLimbah]);
        }

        // jenis pendidikan
        $listJenisPendidikan = ["PAUD", "TK/RA", "SD/MI atau sederajat", "SMP/MTs atau sederajat", "SMA/MA atau sederajat", "Perguruan Tinggi", "Pesantren", "Seminari", "Pendidikan keagamaan lainnya"];
        foreach ($listJenisPendidikan as $jenisPendidikan) {
            JenisPendidikan::create(["jenis" => $jenisPendidikan]);
        }
    }
}
