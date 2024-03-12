<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::get('/register', function () {
    return view('auth.registrasi');
})->middleware('guest')->name('register');
Route::post('/register', [RegistrasiController::class, 'register'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/{id}/pinjam', [PeminjamanController::class, 'formPeminjaman'])->middleware('auth')->name('form.peminjaman');
Route::post('/{id}/pinjam', [PeminjamanController::class, 'buatPeminjaman'])->middleware('auth')->name('buat.peminjaman');
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->middleware('auth')->name('peminjaman');
