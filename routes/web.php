<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route untuk Level
Route::get('/level', [LevelController::class, 'index']);

// Route untuk Kategori
Route::get('/kategori', [KategoriController::class, 'index']);