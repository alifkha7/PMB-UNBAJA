<?php

use App\Http\Controllers\Api\BayarController;
use App\Http\Controllers\Api\PmbController;
use App\Http\Controllers\Api\ProdiController;
use App\Http\Controllers\Api\SoalController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('prodi', [ProdiController::class, 'index']);
Route::resource('pmb', PmbController::class);
Route::get('pmb/user/{id}', [PmbController::class, 'show']);
Route::post('pmb/ujian/{id}', [PmbController::class, 'ujian']);
Route::post('bayar/store', [BayarController::class, 'store']);
Route::get('bayar/user/{id}', [BayarController::class, 'show']);
Route::resource('soal', SoalController::class);