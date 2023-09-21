<?php

namespace Database\Seeders;

use App\Models\Dusun;
use App\Models\Keluarga;
use App\Models\RT;
use App\Models\RW;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        $listDusun = ["blater", "kalimanah", "babakan", "kejobong", "kali sogra"];
        for ($i = 1; $i <= 5; $i++) {
            RT::create([
                'nomor' => $i
            ]);

            RW::create([
                'nomor' => $i
            ]);
        }

        foreach ($listDusun as $dusun) {
            Dusun::create([
                'nama' => $dusun
            ]);
        }

        Keluarga::factory(5)->create();
    }
}
