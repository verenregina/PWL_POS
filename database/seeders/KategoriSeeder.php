<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Matikan FK sementara
        DB::table('m_kategori')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Hidupkan FK lagi

        $data = [
            ['kategori_id' => 1, 'kategori_kode' => 'MK', 'kategori_nama' => 'Makanan'],
            ['kategori_id' => 2, 'kategori_kode' => 'MN', 'kategori_nama' => 'Minuman'],
            ['kategori_id' => 3, 'kategori_kode' => 'EL', 'kategori_nama' => 'Elektronik'],
            ['kategori_id' => 4, 'kategori_kode' => 'AT', 'kategori_nama' => 'Alat Tulis'],
            ['kategori_id' => 5, 'kategori_kode' => 'PK', 'kategori_nama' => 'Pakaian'],
            ['kategori_id' => 6, 'kategori_kode' => 'SNK','kategori_nama' => 'Snack/Makanan Ringan']
        ];

        DB::table('m_kategori')->insert($data);
    }
}