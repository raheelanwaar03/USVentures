<?php

use App\Http\Controllers\user\UserDashboardController;
use Illuminate\Support\Facades\Route;



Route::name('User.')->prefix('User')->middleware('auth', 'user')->group(function () {
    Route::get('/Dashboard', [UserDashboardController::class, 'index'])->name('Dashboard');
    Route::get('/Start', [UserDashboardController::class, 'start'])->name('Start');
    Route::get('/Record', [UserDashboardController::class, 'record'])->name('Record');
    Route::get('Completed/Record', [UserDashboardController::class, 'completedRecord'])->name('Completed.Record');
    Route::get('Rejected/Record', [UserDashboardController::class, 'rejectedRecord'])->name('Rejected.Record');
    Route::get('Submit/Record', [UserDashboardController::class, 'submitRecord'])->name('Submit.Record');
    Route::get('Submit/All/Record/{id}', [UserDashboardController::class, 'submitAllRecord'])->name('Submit.All.Record');
    // add task amount to user account
    Route::get('/Add/Amount/', [UserDashboardController::class, 'addTaskAmount'])->name('Add.Amount');
    // withdraw
    Route::get('/Withdraw', [UserDashboardController::class, 'withdraw'])->name('Withdraw');
    Route::post('/Store/Withdraw', [UserDashboardController::class, 'storeWithdraw'])->name('Store.Withdraw');
    // deposit
    Route::get('/Deposit', [UserDashboardController::class, 'deposit'])->name('Deposit');
    Route::post('/Deposit/Amount', [UserDashboardController::class, 'depositAmount'])->name('Deposit.Amount');
    // transcations
    Route::get('/Transactions', [UserDashboardController::class, 'transactions'])->name('Transactions');
    // add user wallet
    Route::post('/Add/Wallet', [UserDashboardController::class, 'addWallet'])->name('Add.Wallet');
    Route::get('/Team', [UserDashboardController::class, 'team'])->name('Team');
});
