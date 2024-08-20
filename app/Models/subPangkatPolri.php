<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subPangkatPolri extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'pangkat_id'];

    public function pangkatPolri()
    {
        return $this->belongsTo(Pangkat::class, 'pangkat_id');
    }
}
