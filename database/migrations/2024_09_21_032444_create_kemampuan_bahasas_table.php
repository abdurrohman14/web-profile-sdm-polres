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
        Schema::create('kemampuan_bahasas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personel_id')->references('id')->on('personels')->onDelete('cascade');
            $table->string('bahasa');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kemampuan_bahasas');
    }
};
