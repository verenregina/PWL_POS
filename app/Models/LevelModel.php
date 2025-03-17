<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelModel extends Model
{
    protected $table = 'm_level'; 

    protected $fillable = ['level_nama'];
    
    public function users(): HasMany
    {
        return $this->hasMany(UserModel::class, 'level_id', 'id');
    }
}
