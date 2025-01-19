<?php

use App\Http\Controllers\admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;



Route::name('Admin.')->prefix('Admin')->middleware('auth', 'admin')->group(function () {
    Route::get('/Dashboard', [AdminDashboardController::class, 'index'])->name('Dashboard');
    Route::get('/Users', [AdminDashboardController::class, 'users'])->name('Users');
    Route::get('/Add/Task', [AdminDashboardController::class, 'addTask'])->name('Add.Task');
    Route::post('/Store/Task', [AdminDashboardController::class, 'storeTask'])->name('Store.Task');
    Route::get('/All/Task', [AdminDashboardController::class, 'allTasks'])->name('All.Task');
});
