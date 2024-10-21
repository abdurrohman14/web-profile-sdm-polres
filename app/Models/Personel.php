<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personel extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'jabatan_id', 'sub_jabatan_id', 'pangkat_id', 'sub_pangkat_id', 'user_id', 'role_id', 'gambar', 'nama_lengkap',
        'nama_panggilan', 'nrp', 'tempat_lahir', 'email_pribadi', 'email_dinas', 'no_hp',
        'status', 'suku', 'tmt_status', 'golongan_darah', 'jenis_kelamin', 'status_pernikahan', 'anak_ke',
        'agama', 'alamat_personel', 'lkhpn', 'tanggal_lahir', 'jenis_rambut', 'warna_mata',
        'warna_kulit', 'warna_rambut', 'nama_ibu', 'telepon_ortu', 'alamat_ortu', 'tinggi',
        'ukuran_topi', 'ukuran_celana', 'sidik_jari_1', 'nomor_keputusan_penyidik', 'bpjs',
        'npwp', 'nomor_kk', 'berat', 'ukuran_sepatu', 'ukuran_baju', 'sidik_jari_2', 'kta',
        'asabri', 'nik', 'paspor', 'tmt_masa_dinas', 'tanggal_pensiun', 'akte_lahir'
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

    // relasi ek model subPangkat
    public function subPangkat() {
        return $this->belongsTo(subPangkatPolri::class, 'sub_pangkat_id');
    }

    // relasi ke model PangkatPnsPolri
    public function pangkatPnsPolri()
    {
        return $this->belongsTo(pangkat_pns_polri::class, 'pangkat_pns_polri_id');
    }

    // relasi ke model user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // relasi ke model subJabatan
    public function subJabatan() {
        return $this->belongsTo(subJabatan::class, 'sub_jabatan_id');
    }

    // relasi ke model role
    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // relasi ke model pendidikan kepolisian
    public function PendidikanKepolisian() {
        return $this->hasMany(PendidikanKepolisian::class);
    }

    // relasi ke model pendidikan umum
    public function PendidikanUmum() {
        return $this->hasMany(PendidikanUmum::class);
    }

    // relasi ke model riwayat pangkat
    public function RiwayatPangkat() {
        return $this->hasMany(RiwayatPangkat::class);
    }

    // relasi ke model riwayat jabatan
    public function RiwayatJabatan() {
        return $this->hasMany(RiwayatJabatan::class);
    }

    // relasi ke model pendidikan pengembangan & pelatihan
    public function PengembanganPelatihan() {
        return $this->hasMany(PengembanganPelatihan::class);
    }

    // relasi ke model tanda kehormatan
    public function TandaKehormatan() {
        return $this->hasMany(TandaKehormatan::class);
    }

    // relasi ke model kemampuan bahasa
    public function KemampuanBahasa() {
        return $this->hasMany(KemampuanBahasa::class);
    }
    
    // relasi ke model penugasan luar struktur
    public function PenugasanLuarStruktur() {
        return $this->hasMany(PenugasanLuarStruktur::class);
    }

    // menghitung tanggal pensiun dari tanggal lahir
    public function getTanggalPensiunAtribute() {
        if($this->tanggal_lahir) {
            return Carbon::parse($this->tanggal_lahir)->addYears(57)->format('Y-m-d');
        }
        return null;
    }

    public function getLamaJabatan()
    {
        // Asumsi bahwa 'tmt_masa_dinas' adalah kolom di tabel personels yang menyimpan tanggal mulai jabatan
        if ($this->tmt_masa_dinas) {
            $tmt = Carbon::parse($this->tmt_masa_dinas);
            $sekarang = Carbon::now();

            // Hitung lama masa jabatan dalam tahun
            return round($tmt->diffInDays($sekarang) / 365.25);
        }

        // Jika tidak ada TMT atau nilainya null
        return 0;
    }
}
