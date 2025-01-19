<?php

use App\Http\Controllers\user\UserDashboardController;
use Illuminate\Support\Facades\Route;



Route::name('User.')->prefix('User')->middleware('auth', 'user')->group(function () {
    Route::get('/Dashboard', [UserDashboardController::class, 'index'])->name('Dashboard');
});
