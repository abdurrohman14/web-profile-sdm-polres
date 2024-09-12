<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'jabatan_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function getRoleAttribute()
    {
        return $this->role()->first()->name;
    }

    public function personel() {
        return $this->belongsTo(Personel::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class, 'jabatan_id');
    }

    public function subJabatan()
    {
        return $this->belongsTo(subJabatan::class, 'sub_jabatan_id');
    }

    public function sim() {
        return $this->hasMany(sim::class);
    }

    const ROLE_SUPERADMIN = 'superadmin';
    const ROLE_ADMIN = 'admin';
    const ROLE_PERSONIL = 'personil';
}
