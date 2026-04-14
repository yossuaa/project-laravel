<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('headline');
            $table->string('maps'); // path foto maps
            $table->text('alamat');
            $table->string('open');
            $table->string('instagram')->nullable();
            $table->string('subheadline')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable(); // foto tempat
            $table->json('elemen')->nullable(); // ornamen / dekorasi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
