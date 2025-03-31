<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'm_kategori'; // Sesuaikan dengan nama tabel
    protected $primaryKey = 'kategori_id'; // Sesuaikan dengan primary key
    protected $fillable = ['kode_kategori', 'nama_kategori'];
}