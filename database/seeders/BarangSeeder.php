<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'B001', 'barang_nama' => 'Nasi Goreng', 'harga_beli' => 20000, 'harga_jual' => 25000, 'stok' => 10],
            ['barang_id' => 2, 'kategori_id' => 2, 'barang_kode' => 'B002', 'barang_nama' => 'Es Teh Manis', 'harga_beli' => 3000, 'harga_jual' => 5000, 'stok' => 10],
            ['barang_id' => 3, 'kategori_id' => 3, 'barang_kode' => 'B003', 'barang_nama' => 'Laptop', 'harga_beli' => 7500000, 'harga_jual' => 8000000, 'stok' => 5],
            ['barang_id' => 4, 'kategori_id' => 3, 'barang_kode' => 'B004', 'barang_nama' => 'TV LED', 'harga_beli' => 4500000, 'harga_jual' => 5000000, 'stok' => 3],
            ['barang_id' => 5, 'kategori_id' => 4, 'barang_kode' => 'B005', 'barang_nama' => 'Blender', 'harga_beli' => 350000, 'harga_jual' => 400000, 'stok' => 7],
            ['barang_id' => 6, 'kategori_id' => 4, 'barang_kode' => 'B006', 'barang_nama' => 'Setrika', 'harga_beli' => 250000, 'harga_jual' => 300000, 'stok' => 8],
            ['barang_id' => 7, 'kategori_id' => 5, 'barang_kode' => 'B007', 'barang_nama' => 'Celana Jeans', 'harga_beli' => 120000, 'harga_jual' => 150000, 'stok' => 15],
            ['barang_id' => 8, 'kategori_id' => 5, 'barang_kode' => 'B008', 'barang_nama' => 'Kaos Polos', 'harga_beli' => 80000, 'harga_jual' => 100000, 'stok' => 20],
            ['barang_id' => 9, 'kategori_id' => 4, 'barang_kode' => 'B009', 'barang_nama' => 'Meja Kayu', 'harga_beli' => 600000, 'harga_jual' => 700000, 'stok' => 4],
            ['barang_id' => 10, 'kategori_id' => 3, 'barang_kode' => 'B010', 'barang_nama' => 'Handphone', 'harga_beli' => 2500000, 'harga_jual' => 3000000, 'stok' => 6],
        ];        
        DB::table('m_barang')->insert($data);
    }
}
