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
        Schema::create('akses_tenaga_kesehatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("kesehatan_keluarga_id");
            $table->foreign("kesehatan_keluarga_id")->references("id")->on("kesehatan_keluarga");
            $table->unsignedBigInteger("jenis_tenaga_kesehatan_id");
            $table->foreign("jenis_tenaga_kesehatan_id")->references("id")->on("jenis_tenaga_kesehatan");
            $table->unsignedInteger("jarak_tempuh")->nullable();
            $table->unsignedInteger("waktu_tempuh")->nullable();
            $table->enum("status", ["mudah", "sulit"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akses_tenaga_kesehatan');
    }
};
