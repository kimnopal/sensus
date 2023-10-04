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
        Schema::create('status_disabilitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("kesehatan_individu_id");
            $table->foreign("kesehatan_individu_id")->references("id")->on("kesehatan_individu")->cascadeOnDelete();
            $table->unsignedBigInteger("disabilitas_id");
            $table->foreign("disabilitas_id")->references("id")->on("disabilitas");
            $table->enum("status", ["ya", "tidak"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_disabilitas');
    }
};
