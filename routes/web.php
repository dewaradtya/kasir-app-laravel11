<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::resource('/kategori', KategoriController::class)->middleware('userAkses:admin');
    Route::resource('/produk', ProdukController::class);
    Route::resource('/member', MemberController::class);
    Route::resource('/supplier', MemberController::class);
    Route::resource('/pengeluaran', MemberController::class);
    Route::resource('/pembelian', MemberController::class);
    Route::resource('/setting', MemberController::class);
});
