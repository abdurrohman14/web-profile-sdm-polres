<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPangkat extends Model
{
    use HasFactory;

    protected $fillable = [
        'personel_id',
        'pangkat_id',
        'sub_pangkat_id',
        'tanggal_kenaikan',
    ];

    public function personel()
    {
        return $this->belongsTo(Personel::class);
    }

    public function pangkat() {
        return $this->belongsTo(Pangkat::class);
    }

    public function subPangkat() {
        return $this->belongsTo(subPangkatPolri::class);
    }
}
