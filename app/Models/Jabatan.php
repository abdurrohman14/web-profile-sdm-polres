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

    // public function parent() {
    //     return $this->belongsTo(Jabatan::class, 'parent_id');
    // }

    // public function childre() {
    //     return $this->hasMany(Jabatan::class, 'parent_id');
    // }
}
