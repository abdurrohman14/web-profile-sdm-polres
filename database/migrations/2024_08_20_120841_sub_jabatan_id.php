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
        Schema::table('personels', function (Blueprint $table) {
            $table->foreignId('sub_jabatan_id')->nullable()->after('jabatan_id')->constrained('sub_jabatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personels', function (Blueprint $table) {
            $table->dropForeign(['sub_jabatan_id']);
            $table->dropColumn('sub_jabatan_id');
        });
    }
};
