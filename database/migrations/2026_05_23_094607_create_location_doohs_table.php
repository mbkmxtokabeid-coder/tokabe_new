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
        Schema::create('lokasis', function (Blueprint $table) {
            $table->id();
            $table->json('nama');                 // {"en": "...", "id": "..."}
            $table->json('deskripsi_lokasi');     // {"en": "...", "id": "..."}
            $table->string('koordinat')->nullable();
            $table->string('media')->nullable();
            $table->string('size')->nullable();
            $table->string('type')->nullable();
            $table->string('motor')->nullable();
            $table->string('mobil')->nullable();
            $table->string('duration')->nullable();
            $table->string('hour')->nullable();
            $table->string('spot')->nullable();
            $table->string('brand')->nullable();
            $table->string('display')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasis');
    }
};
