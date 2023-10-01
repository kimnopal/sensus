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
        Schema::create('kesehatan_individu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("individu_id");
            $table->foreign("individu_id")->references("id")->on("individu");
            $table->enum("status_jamsoskes", ["peserta", "bukan peserta"]);
            $table->string("no_jamsoskes", 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kesehatan_individu');
    }
};
