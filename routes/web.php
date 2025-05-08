<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\DdcController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PustakaController;
use App\Http\Controllers\JenisAnggotaController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PerpustakaanController;

Route::get('/', [AuthenticatedSessionController::class, 'create']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login'); // Halaman Login
Route::post('/postlogin', [AuthenticatedSessionController::class, 'store'])->name('postlogin'); // Proses Login
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); // Logout

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register/store', [RegisteredUserController::class, 'store']);

Route::middleware(['auth', 'roleAdmin:admin'])->group(function(){
    Route::resource('admin/dashboard', DashboardController::class);
    
    Route::resource('admin/rak', RakController::class);
    Route::resource('admin/ddc', DdcController::class);
    Route::resource('admin/format', FormatController::class);
    Route::resource('admin/penerbit', PenerbitController::class);
    Route::resource('admin/pengarang', PengarangController::class);
    Route::resource('admin/pustaka', PustakaController::class);
    Route::resource('admin/jenis-anggota', JenisAnggotaController::class);
    Route::resource('admin/anggota', AnggotaController::class);
    Route::resource('admin/transaksi', TransaksiController::class);
    Route::resource('admin/perpustakaan', PerpustakaanController::class);
    
    Route::resource('admin/laporan', LaporanController::class);
    Route::post('admin/laporan/print-bulan', [LaporanController::class, 'printBulan'])->name('laporan.printBulan');
    Route::get('admin/laporan/{id}/print', [LaporanController::class, 'print']);
});
Route::middleware(['auth', 'roleAnggota:anggota'])->group(function(){
    Route::resource('anggota/dashboard', DashboardController::class);
    Route::resource('anggota/request', TransaksiController::class);
    
    Route::get('anggota/profile', [AnggotaController::class, 'index']);
    Route::put('anggota/profile/{id}', [AnggotaController::class, 'update']);
    Route::get('anggota/perpustakaan', [PerpustakaanController::class, 'index']);
});
// Route::get('/', function () {
//     return view('layouts.app');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
