<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendidikan_individu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("individu_id");
            $table->foreign("individu_id")->references("id")->on("individu");
            $table->unsignedBigInteger("tingkat_pendidikan_id");
            $table->foreign("tingkat_pendidikan_id")->references("id")->on("tingkat_pendidikan");
            $table->unsignedBigInteger("pendidikan_aktif_id");
            $table->foreign("pendidikan_aktif_id")->references("id")->on("pendidikan_aktif");
            $table->enum("baca_tulis", ["ya", "tidak"]);
            $table->string("bahasa_normal", 100);
            $table->string("bahasa_formal", 100);
            $table->integer("total_kerja_bakti");
            $table->integer("total_siskamling");
            $table->integer("total_pesta_rakyat");
            $table->integer("total_menolong_kematian");
            $table->integer("total_menolong_sakit");
            $table->integer("total_menolong_kecelakaan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan_individu');
    }
};
