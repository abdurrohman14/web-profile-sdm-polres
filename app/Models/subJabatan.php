<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subJabatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jabatan_id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function personel() {
        return $this->hasMany(Personel::class, 'sub_jabatan_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'sub_jabatan_id');
    }
}
