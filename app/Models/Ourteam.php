<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ourteam extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'pangkat_id',
        'jabatan_id',
        'gambar',
        'nrp'
    ];

    public function pangkat() {
        return $this->belongsTo(Pangkat::class, 'pangkat_id', 'id');
    }

    public function jabatan() {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
}
