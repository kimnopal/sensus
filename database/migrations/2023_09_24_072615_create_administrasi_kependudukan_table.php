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
        Schema::create('administrasi_kependudukan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("individu_id");
            $table->foreign("individu_id")->references("id")->on("individu");
            $table->enum("ktp_kia", ["ya", "tidak"]);
            $table->enum("akta_kelahiran", ["ya", "tidak"]);
            $table->string("no_akta")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrasi_kependudukan');
    }
};
