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
        Schema::create('personels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jabatan_id');
            // $table->unsignedBigInteger('sub_jabatan_id');
            $table->unsignedBigInteger('pangkat_id');
            // $table->unsignedBigInteger('pangkat_pns_polri_id');
            $table->unsignedBigInteger('user_id');
            $table->string('gambar')->nullable();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan')->nullable();
            $table->string('nrp');
            $table->string('tempat_lahir');
            $table->string('email_pribadi')->unique();
            $table->string('email_dinas')->unique()->nullable();
            $table->string('no_hp')->unique();
            $table->string('status');
            $table->date('tmt_status');
            $table->string('golongan_darah');
            $table->string('jenis_kelamin');
            $table->string('status_pernikahan');
            $table->integer('anak_ke')->nullable();
            $table->string('agama');
            $table->string('suku')->nullable();
            $table->text('alamat_personel')->nullable();
            $table->string('lkhpn')->nullable();
            $table->date('tanggal_lahir');
            $table->string('jenis_rambut')->nullable();
            $table->string('warna_mata')->nullable();
            $table->string('warna_kulit')->nullable();
            $table->string('warna_rambut')->nullable();
            $table->string('nama_ibu');
            $table->string('telepon_ortu')->nullable();
            $table->text('alamat_ortu')->nullable();
            $table->integer('tinggi')->nullable();
            $table->integer('ukuran_topi')->nullable();
            $table->integer('ukuran_celana')->nullable();
            $table->string('sidik_jari_1')->nullable();
            $table->string('nomor_keputusan_penyidik')->nullable();
            $table->string('bpjs')->unique()->nullable();
            $table->string('npwp')->unique()->nullable();
            $table->string('nomor_kk')->unique()->nullable();
            $table->integer('berat')->nullable();
            $table->integer('ukuran_sepatu')->nullable();
            $table->char('ukuran_baju')->nullable();
            $table->string('sidik_jari_2')->nullable();
            $table->string('kta')->unique()->nullable();
            $table->string('asabri')->unique()->nullable();
            $table->string('nik')->unique();
            $table->string('paspor')->unique()->nullable();
            $table->date('tmt_masa_dinas')->nullable();
            $table->date('tanggal_pensiun')->nullable();
            $table->string('akte_lahir')->nullable();
            $table->foreign('jabatan_id')->references('id')->on('jabatans');
            // $table->foreign('sub_jabatan_id')->references('id')->on('sub_jabatans');
            $table->foreign('pangkat_id')->references('id')->on('pangkats');
            // $table->foreign('pangkat_pns_polri_id')->references('id')->on('pangkat_pns_polris');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personels');
    }
};
