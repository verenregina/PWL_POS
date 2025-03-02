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
            ['kategori_id' => 1, 'kategori_nama' => 'Makanan'],
            ['kategori_id' => 2, 'kategori_nama' => 'Minuman'],
            ['kategori_id' => 3, 'kategori_nama' => 'Elektronik'],
            ['kategori_id' => 4, 'kategori_nama' => 'Peralatan Rumah'],
            ['kategori_id' => 5, 'kategori_nama' => 'Pakaian'],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
