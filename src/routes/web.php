<?php

use App\Http\Controllers\DailyController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

Route::middleware('auth')->controller(DailyController::class)->group(function () {
    Route::get('/', 'dashboard')->name('daily.dashboard');
    Route::get('/daily/user_{user}', 'index')->name('daily.index');
    Route::get('/daily/create', 'create')->name('daily.create');
    Route::post('/daily', 'store')->name('daily.store');
    Route::get('/daily/{daily}', 'show')->name('daily.show');
    Route::get('/daily/{daily}/edit', 'edit')->name('daily.edit');
    Route::put('/daily/{daily}', 'update')->name('daily.update');
    Route::delete('/daily/{daily}', 'delete')->name('daily.delete');
});

Route::middleware('auth')->controller(FollowController::class)->group(function () {
    // Route::get('/follow', 'index')->name('follow.index');
    Route::post('/follow', 'register')->name('follow.register');
    Route::delete('/follow/{followee}', 'delete')->name('follow.delete');
});

require __DIR__.'/auth.php';
