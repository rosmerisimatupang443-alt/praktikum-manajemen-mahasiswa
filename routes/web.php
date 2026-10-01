<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard berdasarkan Role
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

});


/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/user', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

});


/*
|--------------------------------------------------------------------------
| Data Mahasiswa
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Semua user yang sudah login boleh melihat data
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
        ->name('mahasiswa.index');

    // Hanya Admin
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])
        ->middleware('role:admin')
        ->name('mahasiswa.create');

    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])
        ->middleware('role:admin')
        ->name('mahasiswa.store');

    Route::get('/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])
        ->middleware('role:admin')
        ->name('mahasiswa.edit');

    Route::put('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])
        ->middleware('role:admin')
        ->name('mahasiswa.update');

    Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('mahasiswa.destroy');

    // Semua user yang sudah login boleh melihat detail
    Route::get('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show'])
        ->name('mahasiswa.show');
});


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


require __DIR__.'/auth.php';