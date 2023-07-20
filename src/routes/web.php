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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

Route::middleware('auth')->controller(DailyController::class)->group(function () {
    Route::get('/daily', 'index')->name('daily.index');
    Route::get('/daily/create', 'create')->name('daily.create');
    Route::get('/daily/{daily}', 'show')->name('daily.show');
    Route::post('/daily', 'store')->name('daily.store');
    Route::delete('/daily/{daily}', 'delete')->name('daily.delete');
});

Route::middleware('auth')->controller(FollowController::class)->group(function () {
    // Route::get('/follow', 'index')->name('follow.index');
    Route::post('/follow/register', 'register')->name('follow.register');
});

require __DIR__.'/auth.php';
