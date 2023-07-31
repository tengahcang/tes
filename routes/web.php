<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailPeminjamanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('laporan',LaporanController::class);
Route::group(['middleware'=>'auth'],function(){
    Route::get('/detailpeminjaman/create/{id}',[DetailPeminjamanController::class, 'create'])->name('detailpeminjaman.create');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('laporan',LaporanController::class);
    Route::resource('barang',BarangController::class);
    Route::resource('pinjam',PeminjamanController::class);
    Route::resource('detailpeminjaman',DetailPeminjamanController::class);
    Route::get('getEmployees', [PeminjamanController::class, 'getData'])->name('employees.getData');
});
