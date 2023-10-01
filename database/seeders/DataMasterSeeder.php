<?php

namespace Database\Seeders;

use App\Models\Agama;
use App\Models\AkseptorKB;
use App\Models\Dusun;
use App\Models\HubunganKeluarga;
use App\Models\PekerjaanUtama;
use App\Models\RT;
use App\Models\RW;
use App\Models\Satuan;
use App\Models\Suku;
use App\Models\SumberPenghasilan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // dusun
        $listDusun = ["blater", "kalimanah", "babakan", "kejobong", "kali sogra"];
        foreach ($listDusun as $dusun) {
            Dusun::create([
                'nama' => $dusun
            ]);
        }

        // rt & rw
        for ($i = 1; $i <= 5; $i++) {
            RT::create([
                'nomor' => $i
            ]);

            RW::create([
                'nomor' => $i
            ]);
        }

        // agama
        $listAgama = ["Islam", "Kristen", "Katholik", "Hindu", "Budha", "Khonghucu"];
        foreach ($listAgama as $agama) {
            Agama::create([
                'nama' => $agama
            ]);
        }

        // hubungan keluarga
        $listHubungan = ["Kepala Keluarga", "Istri", "Suami", "Anak", "Cucu", "Mertua", "Menantu", "Keponakan"];
        foreach ($listHubungan as $hubungan) {
            HubunganKeluarga::create([
                'nama' => $hubungan
            ]);
        }

        // akseptor kb
        $listAkseptor = ["Pil", "Spiral", "Suntik", "Susuk", "Kondom", "Vasektomi", "Tubektomi", "Tidak KB"];
        foreach ($listAkseptor as $akseptor) {
            AkseptorKB::create([
                'nama' => $akseptor
            ]);
        }

        // suku
        $listSuku = ["Jawa", "Sunda"];
        foreach ($listSuku as $suku) {
            Suku::create([
                'nama' => $suku
            ]);
        }

        // status pernikahan
        $listStatusPernikahan = ["Kawin", "Tidak Kawin", "Cerai Hidup", "Cerai Mati"];
        foreach ($listStatusPernikahan as $statusPernikahan) {
            DB::table("status_pernikahan")->insert([
                'status' => $statusPernikahan
            ]);
        }

        // kondisi pekerjaan
        $listKondisiPekerjaan = ["Bersekolah", "Ibu Rumah Tanggga", "Tidak bekerja", "Sedang mencari pekerjaan", "Bekerja"];
        foreach ($listKondisiPekerjaan as $kondisiPekerjaan) {
            DB::table("kondisi_pekerjaan")->insert([
                "nama" => $kondisiPekerjaan
            ]);
        }

        // pekerjaan utama
        $listPekerjaanUtama = ["Ppetani pemilik lahan", "Petani penyewa", "Buruh Tani", "Nelayan pemilik kapal/perahu", "Nelayan penyewa kapal/perahu", "Buruh Nelayan", "Guru", "Guru Agama", "Pedagang", "Pengolahan/industri", "Pegawai Negeri Sipil/PNS", "TNI", "POLRI", "Buruh migran perempuan", "Buruh migran laki-laki", "Peternak", "Montir", "Dokter swasta", "Bidan swasta", "Perawat swasta", "Pembantu rumah tangga", "Pensiunan PNS/TNI/POLRI", "Pengusahan kecil/menengah", "Pengacara", "Notaris", "Dukun Kampung Terlatih", "Jasa pengobatan alternatif", "Dosen swasta", "Arsitektur", "Seniman/Artis", "Karyawan pers. swasta", "Karyawan pers. pemerintah", "Tukang Jahit", "Perangkat Desa"];
        foreach ($listPekerjaanUtama as $pekerjaanUtama) {
            PekerjaanUtama::create([
                "nama" => $pekerjaanUtama
            ]);
        }

        // satuan
        $listSatuan = ["ton", "kg", "butir", "ekor", "liter", "batang", "hari", "bulan"];
        foreach ($listSatuan as $listSatuan) {
            Satuan::create([
                "nama" => $listSatuan
            ]);
        }

        // sumber penghasilan
        $listSumberPenghasilan = [
            "Padi" => 1,
            "Palawija (jagung, kacang-kacangan, ubi-ubian, dll)" => 1,
            "Hortikultura (buah-buahan, sayur-sayuran, tanaman hias, tanaman obat-obatan, dll)" => 2,
            "Karet" => 1,
            "Kelapa sawit" => 1,
            "Kopi" => 2,
            "Kakao" => 1,
            "Kelapa" => 3,
            "Lada" => 2,
            "Cengkeh" => 2,
            "Tembakau" => 2,
            "Tebu" => 1,
            "Sapi potong" => 4,
            "Susu sapi" => 5,
            "Domba" => 4,
            "Ternak besar lainnya (kuda, kerbau, dll)" => 4,
            "Ayam pedaging" => 4,
            "Telur ayam" => 2,
            "Ternak kecil lainnya (bebek, burung, dll)" => 4,
            "Perikanan tangkap (termasuk biota lainnya)" => 2,
            "Perikanan budidaya (termasuk biota lainnya)" => 2,
            "Bambu" => 6,
            "Budidaya tanaman kehutanan (jati, mahoni, sengon, dll)" => 6,
            "Pemungutan hasil hutan (madu, buah-buahan, kayu bakar, rotan, dll)" => 2,
            "Penangkapan satwa liar (babi, ayam hutan, kijang, dll)" => 4,
            "Penangkaran satwa liar (arwana, buaya, dll)" => 4,
            "Jasa pertanian (sewa traktor, penggilingan, dll)" => 7,
            "Pertambangan dan penggalian" => 2,
            "Industri kerajinan" => 8,
            "Industri pengolahan" => 8,
            "Perdagangan" => 8,
            "Warung dan rumah makan" => 8,
            "Angkutan" => 8,
            "Pergudangan" => 8,
            "Komunikasi" => 8,
            "Jasa diluar pertanian" => 8,
            "Karyawan tetap" => 8,
            "Karyawan tidak tetap" => 8,
            "TNI" => 8,
            "PNS" => 8,
            "TKI di luar negeri" => 8,
            "Sumbangan (dari keluarga, dari pemerintah)" => 8,
        ];
        foreach ($listSumberPenghasilan as $sumberPenghasilan => $satuan) {
            SumberPenghasilan::create([
                "nama" => $sumberPenghasilan,
                "satuan_id" => $satuan,
            ]);
        }
    }
}
