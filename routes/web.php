<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RegisterController;

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

// Route::get('/', function () {
//     return view('template.master');
// });

Route::get('laporan',[LaporanController::class,'index'])->name('laporan');
Route::post('laporan/tambah',[LaporanController::class,'store'])->middleware('auth');
Route::get('laporan/create',[LaporanController::class,'create'])->middleware('auth');
Route::get('laporan/hapus/{id}',[LaporanController::class,'destroy'])->middleware('auth');
Route::post('laporan/modify',[LaporanController::class,'update'])->middleware('auth');
Route::get('laporan/edit/{id}',[LaporanController::class,'edit'])->middleware('auth');

Route::post('laporan/validasi',[PenilaianController::class,'validasi'])->middleware('auth');
Route::get('laporan/validasi/{id}',[LaporanController::class,'showValidation'])->middleware('auth');

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');



Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/visi', function () {
    return view('visi');
});
Route::get('/peraturan', function () {
    return view('peraturan');
});
Route::get('/panduan', function () {
    return view('panduan');
});

