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
        Schema::create('penghasilan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pekerjaan_individu_id");
            $table->foreign("pekerjaan_individu_id")->references("id")->on("pekerjaan_individu");
            $table->unsignedBigInteger("sumber_penghasilan_id");
            $table->foreign("sumber_penghasilan_id")->references("id")->on("sumber_penghasilan");
            $table->unsignedInteger("jumlah")->nullable();
            $table->unsignedInteger("penghasilan")->nullable();
            $table->enum("ekspor", ["semua", "sebagian besar", "tidak"])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghasilan');
    }
};
