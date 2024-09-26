<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatJabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'personel_id',
        'jabatan',
        'tmt',
        'gambar',
    ];

    public function personel()
    {
        return $this->belongsTo(Personel::class);
    }
}
