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
        Schema::create('penugasan_luar_strukturs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personel_id')->references('id')->on('personels')->onDelete('cascade');
            $table->string('penugasan')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasan_luar_strukturs');
    }
};
