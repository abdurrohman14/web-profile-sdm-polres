<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    use HasFactory;

    // protected $fillable = ['nama', 'parent_id'];

    // public function parent() {
    //     return $this->belongsTo(Pangkat::class, 'parent_id');
    // }

    // public function childre() {
    //     return $this->hasMany(Pangkat::class, 'parent_id');
    // }

    protected $fillable = ['nama'];

    public function subPangkatPolri()
    {
        return $this->hasMany(subPangkatPolri::class);
    }

    public function ourteam() {
        return $this->hasMany(Ourteam::class);
    }
}
