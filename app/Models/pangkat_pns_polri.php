<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pangkat_pns_polri extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'parent_id'];

    public function parent() {
        return $this->belongsTo(pangkat_pns_polri::class, 'parent_id');
    }

    public function childre() {
        return $this->hasMany(pangkat_pns_polri::class, 'parent_id');
    }
}
