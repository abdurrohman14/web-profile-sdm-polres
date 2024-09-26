<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KemampuanBahasa extends Model
{
    use HasFactory;

    protected $fillable = ['personel_id', 'bahasa', 'status'];

    public function personel() {
        return $this->belongsTo(Personel::class);
    }
}
