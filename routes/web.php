<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // barang
        Route::resource('barang', BarangController::class)->names([
            'index' => 'item.index',
            'create' => 'item.create',
            'store' => 'item.store',
            'show' => 'item.detail',
            'destroy' => 'item.destroy',
        ]);

        // laporan
        Route::get('/laporan', function () {
            return view('laporan.laporan');
        })->name('laporan');
    });

    Route::middleware('role:user')->group(function () {
        Route::get('/dashboard_user', function () {
            return view('user.dashboard_user');
        })->name('dashboard_user');

        Route::get('/show-user', function () {
            return view('profile.show-user');
        })->name('profile.show-user');

        Route::get('/pinjam-barang', function () {
            return view('user.pinjam');
        })->name('user.pinjam');

        // Route::get('/user/barang', [UserController::class, 'index'])->name('user.index');
        // Route::get('/user/barang/{barang}', [UserController::class, 'detail'])->name('user.detail');

        // Route::get('/request/create', [RequestController::class, 'create'])->name('request.create');
        // Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
