<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeri_foto', function (Blueprint $table) {
            $table->id('id_foto');
            $table->unsignedBigInteger('id_galeri');
            $table->string('gambar');
            $table->string('caption')->nullable();
            $table->integer('urutan')->nullable();
            $table->timestamps();

            $table->foreign('id_galeri')
                ->references('id_galeri')
                ->on('galeri')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeri_foto');
    }
};
