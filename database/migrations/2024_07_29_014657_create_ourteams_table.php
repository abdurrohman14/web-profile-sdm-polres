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
        Schema::create('ourteams', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('pangkat_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->string('nrp');
            $table->string('gambar')->nullable();
            $table->foreign('pangkat_id')->references('id')->on('pangkats');
            $table->foreign('jabatan_id')->references('id')->on('jabatans');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ourteams');
    }
};
