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
        Schema::create('status_penyakit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("kesehatan_individu_id");
            $table->foreign("kesehatan_individu_id")->references("id")->on("kesehatan_individu")->cascadeOnDelete();
            $table->unsignedBigInteger("penyakit_id");
            $table->foreign("penyakit_id")->references("id")->on("penyakit");
            $table->enum("status", ["ya", "tidak"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_penyakit');
    }
};
