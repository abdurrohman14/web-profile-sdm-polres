<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    use HasFactory;

    protected $fillable = [
        'jabatan_id', 'sub_jabatan_id', 'pangkat_id', 'pangkat_pns_polri_id', 'user_id', 'role_id', 'gambar', 'nama_lengkap',
        'nama_panggilan', 'nrp', 'tempat_lahir', 'email_pribadi', 'email_dinas', 'no_hp',
        'status', 'tmt_status', 'golongan_darah', 'jenis_kelamin', 'status_pernikahan', 'anak_ke',
        'agama', 'alamat_personel', 'lkhpn', 'tanggal_lahir', 'jenis_rambut', 'warna_mata',
        'warna_kulit', 'warna_rambut', 'nama_ibu', 'telepon_ortu', 'alamat_ortu', 'tinggi',
        'ukuran_topi', 'ukuran_celana', 'sidik_jari_1', 'nomor_keputusan_penyidik', 'bpjs',
        'npwp', 'nomor_kk', 'berat', 'ukuran_sepatu', 'ukuran_baju', 'sidik_jari_2', 'kta',
        'asabri', 'nik', 'paspor', 'tmt_masa_dinas', 'akte_lahir'
    ];

    // relasi ke model Jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    // relasi ke model Pangkat
    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class);
    }

    // relasi ke model PangkatPnsPolri
    public function pangkatPnsPolri()
    {
        return $this->belongsTo(pangkat_pns_polri::class, 'pangkat_pns_polri_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subJabatan() {
        return $this->belongsTo(subJabatan::class, 'sub_jabatan_id');
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
