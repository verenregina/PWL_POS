<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'm_level';
    protected $primaryKey = 'level_id'; // Ganti dengan nama primary key yang benar
    public $timestamps = true;
    protected $fillable = ['level_kode', 'level_nama'];
}
