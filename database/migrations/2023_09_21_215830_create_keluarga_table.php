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
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id();
            $table->string("provinsi", 50);
            $table->string("kabupaten", 50);
            $table->string("kecamatan", 50);
            $table->string("desa", 100);
            $table->string("no_kk")->unique();
            $table->unsignedBigInteger("dusun_id")->nullable();
            $table->foreign("dusun_id")->references("id")->on("dusun");
            $table->unsignedBigInteger("rt_id")->nullable();
            $table->foreign("rt_id")->references("id")->on("rt");
            $table->unsignedBigInteger("rw_id")->nullable();
            $table->foreign("rw_id")->references("id")->on("rw");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluargas');
    }
};
