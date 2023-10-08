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
        Schema::create('enumerator_keluarga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("keluarga_id");
            $table->foreign("keluarga_id")->references("id")->on("keluarga")->cascadeOnDelete();
            $table->string("nama", 200);
            $table->string("alamat", 200);
            $table->string("no_hp", 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enumerator_keluarga');
    }
};
