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
        Schema::create('pekerjaan_individu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("individu_id");
            $table->foreign("individu_id")->references("id")->on("individu")->cascadeOnDelete();
            $table->unsignedBigInteger("kondisi_pekerjaan_id");
            $table->foreign("kondisi_pekerjaan_id")->references("id")->on("kondisi_pekerjaan");
            $table->unsignedBigInteger("pekerjaan_utama_id");
            $table->foreign("pekerjaan_utama_id")->references("id")->on("pekerjaan_utama");
            $table->enum("status_jamsostek", ["peserta", "bukan peserta"]);
            $table->string("no_jamsostek", 100)->nullable();
            $table->unsignedBigInteger("gaji");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_individus');
    }
};
