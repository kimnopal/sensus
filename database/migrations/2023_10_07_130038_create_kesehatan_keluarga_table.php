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
        Schema::create('kesehatan_keluarga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("keluarga_id");
            $table->foreign("keluarga_id")->references("id")->on("keluarga")->cascadeOnDelete();
            $table->enum("keluarga_posyandu", ["ya", "tidak"]);
            $table->enum("bayi_gizi_baik", ["ya", "tidak"]);
            $table->enum("lansia_posyandu", ["ya", "tidak"]);
            $table->enum("keluarga_jaskesmas", ["ya", "tidak"]);
            $table->enum("pus_tidak_kb", ["ya", "tidak"]);
            $table->enum("keluarga_bkb", ["ya", "tidak"]);
            $table->enum("keluarga_bkr", ["ya", "tidak"]);
            $table->enum("keluarga_bkl", ["ya", "tidak"]);
            $table->enum("keluarga_uppks", ["ya", "tidak"]);
            $table->enum("peserta_paguyuban", ["ya", "tidak"]);
            $table->enum("remaja_pikr", ["ya", "tidak"]);
            $table->enum("remaja_saka_kencana", ["ya", "tidak"]);
            $table->enum("blt", ["ya", "tidak"]);
            $table->enum("pkh", ["ya", "tidak"]);
            $table->enum("bst", ["ya", "tidak"]);
            $table->enum("banpres", ["ya", "tidak"]);
            $table->enum("bantuan_umkm", ["ya", "tidak"]);
            $table->enum("bantuan_pekerja", ["ya", "tidak"]);
            $table->enum("bantuan_pendidikan", ["ya", "tidak"]);
            $table->enum("bantuan_listrik", ["ya", "tidak"]);
            $table->enum("manfaat_pekarangan", ["ada", "tidak"]);
            $table->enum("keluarga_tani", ["ada", "tidak"]);
            $table->enum("keluarga_rukun_nelayan", ["ada", "tidak"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kesehatan_keluarga');
    }
};
