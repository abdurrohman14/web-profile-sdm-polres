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
        Schema::create('riwayat_pangkats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personel_id')->constrained('personels')->onDelete('cascade'); // Menggunakan 'constrained' untuk lebih sederhana
            $table->foreignId('pangkat_id')->constrained('pangkats')->onDelete('cascade'); // Menyimpan id pangkat
            $table->foreignId('sub_pangkat_id')->nullable()->constrained('sub_pangkat_polris')->onDelete('cascade'); // Menyimpan id sub-pangkat (nullable)
            $table->date('tanggal_kenaikan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pangkats');
    }
};
