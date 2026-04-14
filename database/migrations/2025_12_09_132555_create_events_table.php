<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('id_event');  // Primary Key

            // kategori section: top_event, top_workshop, sharing_session
            $table->enum('category', [
                'top_event',
                'top_workshop',
                'sharing_session'
            ]);

            // judul bagian (Top Event, Top Workshop, Sharing Session)
            $table->string('headline')->nullable();

            // subjudul isi event
            $table->string('subheadline')->nullable();

            // tanggal (tidak semua section punya tanggal)
            $table->date('date')->nullable();

            // deskripsi hanya untuk Top Event
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
