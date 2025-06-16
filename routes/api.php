<?php

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LogoutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', App\Http\Controllers\API\RegisterController::class)->name('register');
Route::post('/login', [LoginController::class, 'login']);
Route::middleware('auth:api')->get('/user', [LoginController::class, 'user']);
Route::middleware('auth:api')->post('/logout', [LogoutController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
