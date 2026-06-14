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
        Schema::create('lokasioohs', function (Blueprint $table) {
            $table->id();
            $table->json('nama');                 // {"en": "...", "id": "..."}
            $table->string('tagline')->nullable();
            $table->json('deskripsi_lokasi');     // {"en": "...", "id": "..."}
            $table->string('wilayah')->nullable();
            $table->string('koordinat')->nullable();
            $table->string('media')->nullable();
            $table->string('size')->nullable();
            $table->string('type')->nullable();
            $table->string('motor')->nullable();
            $table->string('mobil')->nullable();
            $table->string('lighting')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasioohs');
    }
};
