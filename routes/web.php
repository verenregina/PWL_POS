<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;

use function Ramsey\Uuid\v1;

// route untuk adminlte welcome
Route::get('/', [WelcomeController::class,'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);              // Menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);          // Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);       // Menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);             // Menyimpan data user baru
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);    // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']);          // Menyimpan data user baru Ajax
    Route::get('/{id}', [UserController::class, 'show']);           // Menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);      // Menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);         // Menyimpan perubahan data user
    Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']);     // Menampilkan halaman form user Ajax
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);     // Menampilkan halaman form edit user Ajax
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);  // Menyimpan perubahan data user Ajax
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
    Route::delete('/{id}', [UserController::class, 'destroy']);     // Menghapus data user
    Route::get('/user/ajax', [UserController::class, 'create_ajax']);
    Route::post('/user/store-ajax', [UserController::class, 'store_ajax']);

});

//level
    Route::prefix('level')->group(function () {
    Route::get('/level', [LevelController::class, 'index']);
    Route::get('/level/data', [LevelController::class, 'getData'])->name('level.data');
    Route::get('/', [LevelController::class, 'index'])->name('level.index');
    Route::get('/data', [LevelController::class, 'getData'])->name('level.data');
    Route::get('/create', [LevelController::class, 'create'])->name('level.create');
    Route::post('/store', [LevelController::class, 'store'])->name('level.store');
    Route::get('/edit/{id}', [LevelController::class, 'edit'])->name('level.edit');
    Route::post('/update/{id}', [LevelController::class, 'update'])->name('level.update');
    Route::get('/level/{id}/show', [LevelController::class, 'show'])->name('level.show');
    Route::delete('/level/{id}', [LevelController::class, 'destroy'])->name('level.destroy');
});

//kategori
Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/data', [KategoriController::class, 'data'])->name('kategori.data');
    Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/{id}/show', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});

//barang
Route::resource('barang', BarangController::class);
Route::get('barang-data', [BarangController::class, 'data'])->name('barang.data');