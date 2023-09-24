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
        Schema::create('pernikahan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("individu_id");
            $table->foreign("individu_id")->references("id")->on("individu");
            $table->unsignedBigInteger("status_pernikahan_id");
            $table->foreign("status_pernikahan_id")->references("id")->on("status_pernikahan");
            $table->enum("status_surat_nikah", ["ya", "tidak"]);
            $table->string("no_surat_nikah", 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pernikahan');
    }
};
