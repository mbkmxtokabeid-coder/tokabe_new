<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photography', function (Blueprint $table) {
            $table->id();
            $table->json('title');              // {"en": "...", "id": "..."}
            $table->json('description');        // {"en": "...", "id": "..."}
            $table->string('image_url')->nullable();
            $table->string('type')->default('photo'); // 'photo' | 'video'
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photography');
    }
};
