<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('homepage');

// Dashboard routes
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'user'], function() {
        Route::get('/', [UserController::class, 'index'])->name('user');
				Route::match(['get', 'post'],'/update', [UserController::class, 'update'])->name('user.update');
				Route::post('/deleteavatar/{id}/{fileName}', [UserController::class, 'deleteavatar'])->name('user.deleteavatar');
    });
});


