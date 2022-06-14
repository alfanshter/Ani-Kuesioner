<?php

use App\Http\Controllers\AkunPemilikController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\ProfilController;
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
Route::get('/', [UsersController::class, 'index'])->middleware('guest');
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
Route::get('/hasil_kuesioner_admin', [KuesionerController::class, 'hasil_kuesioner_admin']);
Route::get('/lihat_hasil_kuesioner/{id?}', [KuesionerController::class, 'lihat_hasil_kuesioner']);
Route::post('/tambah_kuesioner', [KuesionerController::class, 'tambah_kuesioner'])->middleware('admin');
Route::post('/edit_kuesioner', [KuesionerController::class, 'edit_kuesioner'])->middleware('admin');
Route::get('/hapus_kuesioner/{id}', [KuesionerController::class, 'delete'])->middleware('admin');
Route::post('/jawaban_pelanggan', [KuesionerController::class, 'jawaban_pelanggan'])->middleware('auth');

//Profil

Route::get('/profil_admin', [ProfilController::class, 'profil_admin'])->middleware('admin');
Route::get('/profil_pelanggan', [ProfilController::class, 'profil_pelanggan'])->middleware('pelanggan');
Route::get('/profil_pemilik', [ProfilController::class, 'profil_pemilik'])->middleware('pemilik');
Route::post('/update_profil_admin', [ProfilController::class, 'update_profil_admin'])->middleware('admin');
Route::post('/update_profil_pelanggan', [ProfilController::class, 'update_profil_pelanggan'])->middleware('pelanggan');
Route::post('/update_profil_pemilik', [ProfilController::class, 'update_profil_pemilik'])->middleware('pemilik');

//COmplaint
Route::get('/complaint_pelanggan', [ComplaintController::class, 'complaint_pelanggan'])->middleware('pelanggan');
Route::get('/complaint_admin', [ComplaintController::class, 'complaint_admin'])->middleware('admin');
Route::get('/complaint_pemilik', [ComplaintController::class, 'complaint_pemilik'])->middleware('pemilik');
Route::post('/tambah_complaint', [ComplaintController::class, 'tambah_complaint'])->middleware('pelanggan');
Route::post('/edit_complaint', [ComplaintController::class, 'edit_complaint'])->middleware('pelanggan');
Route::get('/hapus_complaint/{id}', [ComplaintController::class, 'hapus_complaint'])->middleware('pelanggan');
Route::get('/complaint_pdf', [ComplaintController::class, 'complaint_pdf'])->middleware('auth');
Route::get('/complaint_diterima/{id}', [ComplaintController::class, 'complaint_diterima'])->middleware('auth');
Route::get('/complaint_ditolak/{id}', [ComplaintController::class, 'complaint_ditolak'])->middleware('auth');

//Dashbaard
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/unduh_grafik', [DashboardController::class, 'unduh_grafik']);
