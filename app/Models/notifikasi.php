<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class notifikasi extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['personel_id', 'tipe', 'pesan', 'sedang_dibaca'];

    public function personel()
    {
        return $this->belongsTo(Personel::class);
    }
}
