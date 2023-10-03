<?php

namespace Database\Seeders;

use App\Models\AdministrasiKependudukan;
use App\Models\Individu;
use App\Models\Keluarga;
use App\Models\PekerjaanIndividu;
use App\Models\Penghasilan;
use App\Models\Pernikahan;
use App\Models\StatusPernikahan;
use App\Models\SumberPenghasilan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            DataMasterSeeder::class
        ]);

        Keluarga::factory(5)->create();
        Individu::factory(10)->has(PekerjaanIndividu::factory(1), "pekerjaan_individu")->create();
        // PekerjaanIndividu::factory(10)->create();
        $statusPernikahan = StatusPernikahan::all();
        Individu::all()->each(function (Individu $individu) use ($statusPernikahan) {
            Pernikahan::create([
                "individu_id" => $individu->id,
                "status_pernikahan_id" => $statusPernikahan->random(1)->first()->id,
                "status_surat_nikah" => "tidak",
                "no_surat_nikah" => "",
            ]);

            AdministrasiKependudukan::create([
                "individu_id" => $individu->id,
                "status_ktp_kia" => "ya",
                "status_akta_kelahiran" => "ya",
                "no_akta_kelahiran" => "123"
            ]);
        });

        $pekerjaanIndividu = PekerjaanIndividu::all();
        $sumberPenghasilan = SumberPenghasilan::all();

        $pekerjaanIndividu->each(function (PekerjaanIndividu $pekerjaan) use ($sumberPenghasilan) {
            $sumberPenghasilan->random(rand(1, 2))->each(function (SumberPenghasilan $penghasilan) use ($pekerjaan) {
                Penghasilan::create([
                    "pekerjaan_individu_id" => $pekerjaan->id,
                    "sumber_penghasilan_id" => $penghasilan->id,
                    "jumlah" => fake()->numerify("###"),
                    "penghasilan" => fake()->numerify("#######"),
                    "ekspor" => ["semua", "sebagian besar", "tidak"][array_rand(["semua", "sebagian besar", "tidak"])],
                ]);
            });
        });
    }
}
