<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'jenis', 'nomor', 'file'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}