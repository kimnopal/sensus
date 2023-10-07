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
        Schema::create('akses_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pendidikan_keluarga_id");
            $table->foreign("pendidikan_keluarga_id")->references("id")->on("pendidikan_keluarga")->cascadeOnDelete();
            $table->unsignedBigInteger("jenis_pendidikan_id");
            $table->foreign("jenis_pendidikan_id")->references("id")->on("jenis_pendidikan");
            $table->unsignedInteger("jarak_tempuh")->nullable();
            $table->unsignedInteger("waktu_tempuh")->nullable();
            $table->enum("status", ["mudah", "sulit"])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akses_pendidikan');
    }
};
