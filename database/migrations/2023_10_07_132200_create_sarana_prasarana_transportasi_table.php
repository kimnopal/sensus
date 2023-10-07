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
        Schema::create('sarana_prasarana_transportasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("kesehatan_keluarga_id");
            $table->foreign("kesehatan_keluarga_id")->references("id")->on("kesehatan_keluarga");
            $table->unsignedBigInteger("tujuan_transportasi_id");
            $table->foreign("tujuan_transportasi_id")->references("id")->on("tujuan_transportasi");
            $table->enum("jenis_transportasi_terlama", ["darat", "air", "udara"]);
            $table->enum("penggunaan_transportasi_umum", ["ya", "tidak"]);
            $table->unsignedInteger("waktu_tempuh");
            $table->unsignedInteger("biaya");
            $table->enum("kemudahan", ["mudah", "sulit"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarana_prasarana_transportasi');
    }
};
