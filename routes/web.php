<?php

use App\Http\Controllers\AkunPemilikController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\UsersController;
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

//USER
Route::get('/login', [UsersController::class, 'login_view'])->name('login')->middleware('guest');
Route::get('/logout', [UsersController::class, 'logout'])->middleware('auth');
Route::get('/', [UsersController::class, 'index'])->middleware('auth');
Route::get('/register', [UsersController::class, 'register_view_pelanggan'])->middleware('guest');
Route::post('/register', [UsersController::class, 'register_pengguna'])->middleware('guest');
Route::get('/register_admin', [UsersController::class, 'register_view_admin'])->middleware('guest');
Route::post('/register_admin', [UsersController::class, 'register_admin']);
Route::post('/login', [UsersController::class, 'login']);

//AKUN PEMILIK
Route::get('/akun_pemilik', [AkunPemilikController::class, 'akun_pemilik'])->middleware('admin');
Route::post('/akun_pemilik', [AkunPemilikController::class, 'daftar_pemilik'])->middleware('admin');
Route::post('/edit_akun_pemilik', [AkunPemilikController::class, 'edit_akun_pemilik'])->middleware('admin');
Route::get('/hapus_akun_pemilik/{id}', [AkunPemilikController::class, 'hapus_akun_pemilik'])->middleware('admin');

//Kuesioner
Route::get('/kuesioner', [KuesionerController::class, 'kuesioner']);
Route::get('/kuesioner_admin', [KuesionerController::class, 'kuesioner_admin']);
Route::post('/tambah_kuesioner', [KuesionerController::class, 'tambah_kuesioner'])->middleware('admin');
Route::post('/edit_kuesioner', [KuesionerController::class, 'edit_kuesioner'])->middleware('admin');
Route::get('/hapus_kuesioner/{id}', [KuesionerController::class, 'delete'])->middleware('admin');
