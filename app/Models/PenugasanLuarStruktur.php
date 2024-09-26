<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenugasanLuarStruktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'personel_id',
        'penugasan',
        'lokasi',
        'gambar',
    ];

    public function personel()
    {
        return $this->belongsTo(Personel::class);
    }
}
