<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PmbController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SoalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return redirect('/dashboard');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index']);
    });

    Route::resource('/prodi', ProdiController::class);
    Route::resource('/pmb', PmbController::class);
    Route::get('/search', [PmbController::class, 'search'])->name('search');
    Route::resource('/bayar', BayarController::class);
    Route::get('/bayar/confirm/{id}', [BayarController::class, 'confirm'])->name('pembayaranConfirm');
    Route::resource('/soal', SoalController::class);
    Route::get('ubahStatus', [PmbController::class, 'ubah']);

    // Route::middleware(['user'])->group(function () {
    //     Route::get('user', [UserController::class, 'index']);
    // });

    Route::get('/logout', function () {
        Auth::logout();
        redirect('/');
    });

});