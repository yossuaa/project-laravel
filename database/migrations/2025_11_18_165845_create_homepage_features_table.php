<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('homepage_features', function (Blueprint $table) {
            $table->id('id_feature');
            $table->string('nama_fitur');
            $table->string('gambar');  // "1.jpg", "2.jpeg", dll.
            $table->string('link_tujuan');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_features');
    }
};
