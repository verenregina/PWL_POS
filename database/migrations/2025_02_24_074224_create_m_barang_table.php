<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('m_barang', function (Blueprint $table) {
            $table->decimal('harga_beli', 12, 2)->after('barang_nama')->nullable();
            $table->decimal('harga_jual', 12, 2)->after('harga_beli')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('m_barang', function (Blueprint $table) {
            $table->dropColumn(['harga_beli', 'harga_jual']);
        });
    }
};
