<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentInformationController;
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
    Route::get('violators', [ViolatorController::class, 'index'])->name("violator.index");
    Route::get('violator/{studentInformation}', [ViolatorController::class, 'show'])->name("violator.show");
    Route::post('resolve-violation', [ViolatorController::class, 'resolve'])->name("resolve-violation");
});

// ** Route for guard and superadministrator
Route::group(['middleware' => ['auth', 'role:guard|superadministrator']], function() {
    Route::get('students-information', [StudentInformationController::class, 'index'])->name("students.index");
    Route::get('students-information/{studentInformation}', [StudentInformationController::class, 'show'])->name("students.show");
});

// ** Route for guard
Route::group(['middleware' => ['auth', 'role:guard']], function() {
    Route::get('violator/create/{student}', [ViolatorController::class, 'create'])->name("violator.create");
    Route::post('violator', [ViolatorController::class, 'store'])->name("violator.store");
});

// ** Route for Encoder
Route::group(['middleware' => ['auth', 'role:encoder']], function() {
    Route::post('students', [StudentInformationController::class, 'store'])->name("students.store");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
