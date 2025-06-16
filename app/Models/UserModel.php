<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject; // Untuk JWT Authentication
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Extend Auth untuk fitur login
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class UserModel extends Authenticatable
{

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username',
        'password',
        'nama',
        'level_id',
        'created_at',
        'updated_at'
    ];

    protected $hidden = ['password']; // Menyembunyikan password saat di-serialize

    protected $casts = ['password' => 'hashed', // Hash otomatis saat mengisi/mengupdate password
];
    /**
     * Relasi ke tabel level
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function getRoleName(): string
    {
        return $this->level->level_name ;
    }

    public function hasRole($role): bool
    {
        return $this->level->level_kode === $role;
    }

    public function getRole()
    {
        return $this->level->level_kode;
}
}