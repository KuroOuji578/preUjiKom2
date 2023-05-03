<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Models\Mahasiswa;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dash');
Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('dash.create');
Route::post('/dashboard/store', [DashboardController::class, 'store'])->name('dash.store');
Route::get('/dashboard/destroy/{id}', [DashboardController::class, 'destroy'])->name('dash.destroy');



//=========================================
//matakuliah route
Route::get('/matakuliah', [MatkulController::class, 'index'])->name('matkul');
Route::get('/matakuliah/create', [MatkulController::class, 'create'])->name('matkul.create');
Route::post('/matakuliah/store', [MatkulController::class, 'store'])->name('matkul.store');

Route::get('/matakuliah/destroy/{id}', [MatkulController::class, 'destroy'])->name('matkul.destroy');

//=========================================
//mahasiswa route
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');

Route::get('/mahasiswa/destroy/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
