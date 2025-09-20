<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\LetterCategoryController;
use App\Http\Controllers\Dashboard\LetterController;
use App\Http\Controllers\Dashboard\ProfileController;
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


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
});

Route::redirect('/', '/dashboard/letters');

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
    Route::get('/change-password', [AuthController::class, 'changePassword'])->name('auth.change-password');
    Route::put('/change-password', [AuthController::class, 'updatePassword'])->name('auth.update-password');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::resource('/letters', LetterController::class);
    Route::resource('/letter-categories', LetterCategoryController::class);
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
});
