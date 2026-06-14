<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->json('judul');              // {"en": "...", "id": "..."}
            $table->json('deskripsi');          // {"en": "...", "id": "..."}
            $table->json('lokasi');             // {"en": "...", "id": "..."}
            $table->dateTime('waktu');
            $table->string('gambar')->nullable();
            $table->string('koordinat')->nullable();
            $table->string('kode_event')->unique();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
