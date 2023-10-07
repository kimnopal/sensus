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
        Schema::create('pendidikan_keluarga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("keluarga_id");
            $table->foreign("keluarga_id")->references("id")->on("keluarga")->cascadeOnDelete();
            $table->enum("anak_bersekolah", ["ada", "tidak"]);
            $table->enum("anak_putus_sekolah", ["ada", "tidak"]);
            $table->enum("buta_huruf", ["ada", "tidak"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan_keluarga');
    }
};
