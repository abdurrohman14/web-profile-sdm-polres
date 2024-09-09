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
            $table->foreignId('sub_pangkat_id')->nullable()->after('pangkat_id')->constrained('sub_pangkat_polris')->onDelete('cascade');
            $table->foreignId('sub_pns_polri_id')->nullable()->after('pangkat_pns_polri_id')->constrained('sub_pns_polris')->onDelete('cascade');
            $table->foreignId('role_id')->nullable()->after('user_id')->constrained('roles')->onDelete('cascade');
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
            $table->dropForeign(['sub_pangkat_id']);
            $table->dropColumn('sub_pangkat_id');
            $table->dropForeign(['sub_pns_polri_id']);
            $table->dropColumn('sub_pns_polri_id');
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
    }
};
