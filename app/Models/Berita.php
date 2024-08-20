<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'foto',
        'judul',
        'slug',
        'deskripsi'
    ];

    public function sluggable():array {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
