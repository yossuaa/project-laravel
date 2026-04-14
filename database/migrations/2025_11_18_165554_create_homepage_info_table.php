<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('homepage_info', function (Blueprint $table) {
            $table->id('id_homepage');
            $table->string('headline')->nullable();
            $table->string('subheadline')->nullable();
            $table->string('background_image')->nullable(); // BG.jpg
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_info');
    }
};
