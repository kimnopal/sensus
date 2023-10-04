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
        Schema::create('frekuensi_perawatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("kesehatan_individu_id");
            $table->foreign("kesehatan_individu_id")->references("id")->on("kesehatan_individu")->cascadeOnDelete();
            $table->unsignedBigInteger("faskes_id");
            $table->foreign("faskes_id")->references("id")->on("faskes");
            $table->integer("frekuensi")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frekuensi_perawatan');
    }
};
