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
        Schema::create('cartas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('type')->nullable();
            $table->string('race')->nullable();
            $table->text('desc')->nullable();
            $table->integer('atk')->nullable();
            $table->integer('def')->nullable();
            $table->integer('level')->nullable();
            $table->string('attribute')->nullable();
            $table->string('image_url')->nullable();
            $table->string('url')->nullable(); // link a ygoprodeck
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('cartas');
    }
};
