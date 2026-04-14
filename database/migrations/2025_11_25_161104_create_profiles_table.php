<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->string('headline')->nullable(); // Profile & Sejarah Rumah Budaya Ratna
            $table->text('deskripsi')->nullable();

            $table->string('headline_visi')->nullable(); // Visi
            $table->text('deskripsi_visi')->nullable();

            $table->string('headline_misi')->nullable(); // Misi
            $table->text('deskripsi_misi')->nullable();

            $table->string('gambar')->nullable(); // satu gambar.png

            $table->timestamps();
            // 3 gambar berbeda
            $table->string('gambar_profile')->nullable();
            $table->string('gambar_visi')->nullable();
            $table->string('gambar_misi')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
