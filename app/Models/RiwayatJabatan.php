<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatJabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'personel_id',
        'jabatan_id',
        'sub_jabatan_id',
        'tanggal_kenaikan',
    ];

    public function personel()
    {
        return $this->belongsTo(Personel::class);
    }

    public function jabatan() {
        return $this->belongsTo(Jabatan::class);
    }

    public function subJabatan() {
        return $this->belongsTo(SubJabatan::class);
    }
}
