<?php

<<<<<<< HEAD
=======
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RequestController;
>>>>>>> 6cdff83df70f20baecea80b76b78909559561b91
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

<<<<<<< HEAD
=======
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
>>>>>>> 6cdff83df70f20baecea80b76b78909559561b91

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', function () {

            // return 'dashboard admin';
            return view('admin.dashboard');
        })->name('dashboard');
        // barang
        Route::get('/barang', [BarangController::class, 'index'])->name('item.index');
        Route::get('/barang/create', [BarangController::class, 'create'])->name('item.create');
        Route::post('/barang/store', [BarangController::class, 'store'])->name('item.store');
        Route::get('/barang/{barang}', [BarangController::class, 'detail'])->name('item.detail');
        Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('item.destroy');

        // laporan
        Route::get('/laporan', function () {
            // return 'dashboard admin';
            return view('laporan.laporan');
        })->name('laporan');
    });

    Route::middleware('role:user')->group(function () {
        Route::get('/dashboard_user', function () {
            // return 'dashboard user';
            return view('user.dashboard_user');
        })->name('dashboard_user');

        Route::get('/show-user', function () {
            //
            return view('profile.show-user');
        })->name('profile.show-user');

        Route::get('/pinjam-barang', function () {
            //
            return view('user.pinjam');
        })->name('user.pinjam');

        Route::get('/user/barang', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/barang/{barang}', [UserController::class, 'detail'])->name('user.detail');

        Route::get('/request/create', [RequestController::class, 'create'])->name('request.create');
        Route::post('/requests', [App\Http\Controllers\RequestController::class, 'store'])->name('requests.store');
    });
});