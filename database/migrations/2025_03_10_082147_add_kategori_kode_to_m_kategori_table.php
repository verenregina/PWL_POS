<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::table('m_kategori', function (Blueprint $table) {
        if (!Schema::hasColumn('m_kategori', 'kategori_kode')) {
            $table->string('kategori_kode', 10)->after('kategori_id');
        }
    });
}

    public function down(): void
    {
        Schema::table('m_kategori', function (Blueprint $table) {
            $table->dropColumn('kategori_kode');
        });
    }
};
