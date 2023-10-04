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
        Schema::create('permukiman_keluarga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("keluarga_id");
            $table->foreign("keluarga_id")->references("id")->on("keluarga")->cascadeOnDelete();
            $table->unsignedBigInteger("status_rumah_id");
            $table->foreign("status_rumah_id")->references("id")->on("status_rumah");
            $table->unsignedBigInteger("status_lahan_id");
            $table->foreign("status_lahan_id")->references("id")->on("status_lahan");
            $table->unsignedInteger("luas_lantai");
            $table->unsignedInteger("luas_lahan");
            $table->unsignedBigInteger("jenis_lantai_id");
            $table->foreign("jenis_lantai_id")->references("id")->on("jenis_lantai");
            $table->unsignedBigInteger("jenis_dinding_id");
            $table->foreign("jenis_dinding_id")->references("id")->on("jenis_dinding");
            $table->enum("status_jendela", ["berfungsi", "tidak berfungsi", "tidak ada"]);
            $table->unsignedBigInteger("jenis_atap_id");
            $table->foreign("jenis_atap_id")->references("id")->on("jenis_atap");
            $table->unsignedBigInteger("jenis_penerangan_id");
            $table->foreign("jenis_penerangan_id")->references("id")->on("jenis_penerangan");
            $table->unsignedBigInteger("jenis_energi_memasak_id");
            $table->foreign("jenis_energi_memasak_id")->references("id")->on("jenis_energi_memasak");
            $table->unsignedBigInteger("sumber_kayu_id");
            $table->foreign("sumber_kayu_id")->references("id")->on("sumber_kayu");
            $table->enum("tempat_pembuangan_sampah", ["tidak ada", "di kebun/sungai/drainase", "dibakar", "tempat sampah", "diangkut"]);
            $table->enum("fasilitas_mck", ["sendiri", "berkelompok/tetangga", "mck umum", "tidak ada"]);
            $table->unsignedBigInteger("sumber_air_mandi_id");
            $table->foreign("sumber_air_mandi_id")->references("id")->on("sumber_air_mandi");
            $table->enum("fasilitas_bab", ["jamban sendiri", "jamban bersama/tetangga", "mck umum", "tidak ada"]);
            $table->unsignedBigInteger("sumber_air_minum_id");
            $table->foreign("sumber_air_minum_id")->references("id")->on("sumber_air_minum");
            $table->unsignedBigInteger("pembuangan_limbah_id");
            $table->foreign("pembuangan_limbah_id")->references("id")->on("pembuangan_limbah");
            $table->enum("rumah_dibawah_sutet", ["ya", "tidak"]);
            $table->enum("rumah_dibantaran_sungai", ["ya", "tidak"]);
            $table->enum("rumah_dilereng", ["ya", "tidak"]);
            $table->enum("kondisi_rumah", ["kumuh", "tidak kumuh"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permukiman_keluarga');
    }
};
