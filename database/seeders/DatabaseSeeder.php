<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KategoriSeeder::class,
            BarangSeeder::class,
            LevelSeeder::class,
            PenjualanDetailSeeder::class,
            PenjualanSeeder::class,
            StokSeeder::class,
            UserSeeder::class
        ]);
    }
}
