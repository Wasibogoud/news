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
        Schema::create('noticias', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('url')->unique(); // clave única para evitar duplicados
    $table->text('abstract')->nullable();
    $table->string('section')->nullable();
    $table->dateTime('published_date')->nullable();
    $table->string('image_url')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
