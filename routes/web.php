<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return redirect()->route('login'); 
});


Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //siswa
    Route::resource('siswa', SiswaController::class);
    Route::get('/search/siswa', [SiswaController::class, 'search'])->name('siswa.search');

    //buku
    Route::resource('buku', BukuController::class);
    Route::get('/search', [BukuController::class, 'search'])->name('buku.search');

    //peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::get('/peminjaman/show', [PeminjamanController::class, 'show'])->name('peminjaman.show');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/peminjaman/search', [PeminjamanController::class, 'search'])->name('peminjaman.search');
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    
    //pengembalian
    Route::prefix('pengembalian')->group(function () {
        Route::get('/', [PengembalianController::class, 'index'])->name('pengembalian.index');
        Route::get('/create', [PengembalianController::class, 'create'])->name('pengembalian.create');
        Route::get('/show', [PengembalianController::class, 'show'])->name('pengembalian.show');
        Route::post('/store', [PengembalianController::class, 'store'])->name('pengembalian.store');
        Route::get('/pengembalian/search', [PengembalianController::class, 'search'])->name('pengembalian.search');
        Route::delete('/pengembalian/{id}', [PengembalianController::class, 'destroy'])->name('pengembalian.destroy');
    });
    

    //profile
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

    //report
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

// Authentication routes
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
