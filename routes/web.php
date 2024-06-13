<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViolatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});

// ** Route for superadministrator
Route::group(['middleware' => ['auth', 'role:superadministrator']], function() {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

// ** Route for guard and superadministrator
Route::group(['middleware' => ['auth', 'role:guard|superadministrator']], function() {
    Route::get('violators', [ViolatorController::class, 'index'])
                ->name('violator.index');
});

// ** Route for Encoder
Route::group(['middleware' => ['auth', 'role:encoder']], function() {
    Route::post('violators', [ViolatorController::class, 'store'])->name('violators.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
