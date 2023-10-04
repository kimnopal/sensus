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
        Schema::create('kondisi_fisik_rumah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("permukiman_keluarga_id");
            $table->foreign("permukiman_keluarga_id")->references("id")->on("permukiman_keluarga");
            $table->unsignedBigInteger("tata_guna_id");
            $table->foreign("tata_guna_id")->references("id")->on("tata_guna");
            $table->enum("status", ["ya", "tidak"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi_fisik_rumah');
    }
};
