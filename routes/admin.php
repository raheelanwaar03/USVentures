<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\DepositController;
use Illuminate\Support\Facades\Route;



Route::name('Admin.')->prefix('Admin')->middleware('auth', 'admin')->group(function () {
    Route::get('/Dashboard', [AdminDashboardController::class, 'index'])->name('Dashboard');
    Route::get('/Users', [AdminDashboardController::class, 'users'])->name('Users');
    Route::get('/Add/Task', [AdminDashboardController::class, 'addTask'])->name('Add.Task');
    Route::post('/Store/Task', [AdminDashboardController::class, 'storeTask'])->name('Store.Task');
    Route::get('/All/Task', [AdminDashboardController::class, 'allTasks'])->name('All.Task');
    // change the status
    Route::get('/Change/Status/{id}', [AdminDashboardController::class, 'changeStatus'])->name('Change.Status');
    // deposit page
    Route::get('/Deposit', [DepositController::class, 'addDeposit'])->name('Deposit.Method');
    Route::post('/Store/Deposit/Method', [DepositController::class, 'storeWallet'])->name('Store.Method');
    Route::get('/All/Deposit/Method', [DepositController::class, 'allMethod'])->name('All.Method');
});
