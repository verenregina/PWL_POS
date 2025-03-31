<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    
    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    public $timestamps = true;

    protected $fillable = ['barang_kode', 'barang_nama', 'kategori_id', 'harga', 'stok'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}