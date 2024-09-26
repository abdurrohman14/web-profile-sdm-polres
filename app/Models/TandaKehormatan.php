<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaKehormatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'personel_id',
        'tanda_kehormatan',
        'tmt',
        'gambar',
    ];

    public function personel()
    {
        return $this->belongsTo(Personel::class);
    }
}
