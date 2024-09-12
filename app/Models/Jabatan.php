<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function subJabatans()
    {
        return $this->hasMany(subJabatan::class);
    }

    public function ourteam(){ 
        return $this->hasMany(Ourteam::class);
    }

    public function personels() {
        return $this->hasMany(Personel::class);
    }

}
