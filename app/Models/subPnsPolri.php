<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subPnsPolri extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'pangkat_pns_polri_id'];

    public function pangkatPnsPolri()
    {
        return $this->belongsTo(pangkat_pns_polri::class);
    }
}
