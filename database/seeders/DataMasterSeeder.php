<?php

namespace Database\Seeders;

use App\Models\Agama;
use App\Models\AkseptorKB;
use App\Models\Dusun;
use App\Models\HubunganKeluarga;
use App\Models\RT;
use App\Models\RW;
use App\Models\Suku;
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
        $listAgama = ["islam", "kristen", "katholik", "hindu", "budha", "khonghucu"];
        foreach ($listAgama as $agama) {
            Agama::create([
                'nama' => $agama
            ]);
        }

        // hubungan keluarga
        $listHubungan = ["kepala keluarga", "istri", "suami", "anak", "cucu", "mertua", "menantu", "keponakan"];
        foreach ($listHubungan as $hubungan) {
            HubunganKeluarga::create([
                'nama' => $hubungan
            ]);
        }

        // akseptor kb
        $listAkseptor = ["pil", "spiral", "suntik", "susuk", "kondom", "vasektomi", "tubektomi", "tidak kb"];
        foreach ($listAkseptor as $akseptor) {
            AkseptorKB::create([
                'nama' => $akseptor
            ]);
        }

        // suku
        $listSuku = ["jawa", "sunda"];
        foreach ($listSuku as $suku) {
            Suku::create([
                'nama' => $suku
            ]);
        }

        // status pernikahan
        $listStatusPernikahan = ["kawin", "tidak kawin", "cerai hidup", "cerai mati"];
        foreach ($listStatusPernikahan as $statusPernikahan) {
            DB::table("status_pernikahan")->insert([
                'status' => $statusPernikahan
            ]);
        }
    }
}
