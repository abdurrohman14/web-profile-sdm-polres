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
        Schema::create('sub_pns_polris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pangkat_pns_polri_id');
            $table->foreign('pangkat_pns_polri_id')->references('id')->on('pangkat_pns_polris')->onDelete('cascade');
            $table->string('nama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_pns_polris');
    }
};
