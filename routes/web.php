<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;

use function Ramsey\Uuid\v1;

// route untuk adminlte welcome
Route::get('/', [WelcomeController::class,'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);          //menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);      //menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);   //menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);         //menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);       //menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  //menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);     //menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); //menghapus data user
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