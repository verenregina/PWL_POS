<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('m_barang', function (Blueprint $table) {
            $table->string('barang_nama', 100)->after('barang_kode'); // Menambahkan kolom
        });
    }

    public function down(): void
    {
        Schema::table('m_barang', function (Blueprint $table) {
            $table->dropColumn('barang_nama'); // Menghapus kolom jika rollback
        });
    }
};
