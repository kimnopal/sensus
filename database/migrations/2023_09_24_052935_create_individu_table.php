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
        Schema::create('individu', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 100);
            $table->string("nik")->unique();
            $table->string("no_kk");
            $table->foreign("no_kk")->references("no_kk")->on("keluarga");
            $table->enum("jenis_kelamin", ["laki-laki", "perempuan"]);
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->unsignedBigInteger("agama_id");
            $table->foreign("agama_id")->references("id")->on("agama");
            $table->enum("golongan_darah", ["o", "a", "b", "ab"]);
            $table->unsignedBigInteger("hubungan_keluarga_id");
            $table->foreign("hubungan_keluarga_id")->references("id")->on("hubungan_keluarga");
            $table->unsignedBigInteger("akseptor_kb_id");
            $table->foreign("akseptor_kb_id")->references("id")->on("akseptor_kb");
            $table->unsignedBigInteger("suku_id");
            $table->foreign("suku_id")->references("id")->on("suku");
            $table->string("nama_ortu", 100);
            $table->enum("warganegara", ["wni", "wna"]);
            $table->string("no_hp", 50);
            $table->string("no_wa", 50);
            $table->string("email", 100);
            $table->string("facebook", 100);
            $table->string("twitter", 100);
            $table->string("instagram", 100);
            $table->enum("step", ["deskripsi", "pekerjaan", "kesehatan", "pendidikan"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individu');
    }
};
