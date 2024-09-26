<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanKepolisian extends Model
{
    use HasFactory;

    protected $fillable = [
        'personel_id',
        'tingkat',
        'tahun',
        'gambar',
    ];

    public function personel()
    {
        return $this->belongsTo(Personel::class);
    }
}
