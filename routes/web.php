<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',          [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/jadwal',            [DashboardController::class, 'store'])->name('jadwal.store');
    Route::patch('/jadwal/{jadwal}',  [DashboardController::class, 'updateStatus'])->name('jadwal.status');
    Route::delete('/jadwal/{jadwal}', [DashboardController::class, 'destroy'])->name('jadwal.destroy');
    Route::delete('/jadwal-selesai',  [DashboardController::class, 'destroyDone'])->name('jadwal.destroyDone');
});

require __DIR__.'/auth.php';
