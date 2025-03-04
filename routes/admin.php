<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\ContentManagement;
use App\Http\Controllers\admin\DepositController;
use App\Http\Controllers\admin\UserManagement;
use Illuminate\Support\Facades\Route;



Route::name('Admin.')->prefix('Admin')->middleware('auth', 'admin')->group(function () {
    Route::get('/Dashboard', [AdminDashboardController::class, 'index'])->name('Dashboard');
    Route::get('/Users', [AdminDashboardController::class, 'users'])->name('Users');
    Route::get('/Add/Task', [AdminDashboardController::class, 'addTask'])->name('Add.Task');
    Route::post('/Store/Task', [AdminDashboardController::class, 'storeTask'])->name('Store.Task');
    Route::get('/All/Task', [AdminDashboardController::class, 'allTasks'])->name('All.Task');
    Route::get('/Edit/Task/{id}', [AdminDashboardController::class, 'editTask'])->name('Edit.Task');
    Route::post('/Update/Task/{id}', [AdminDashboardController::class, 'updateTask'])->name('Update.Task');
    Route::get('/Delete/Task/{id}', [AdminDashboardController::class, 'deleteTask'])->name('Delete.Task');
    // change the status
    Route::get('/Change/Status/{id}', [AdminDashboardController::class, 'changeStatus'])->name('Change.Status');
    Route::post('/Add/Deposit/{id}', [AdminDashboardController::class, 'addDepositAmount'])->name('Add.Deposit.Amount');
    Route::post('/Update/User/Password/{id}', [AdminDashboardController::class, 'changePassword'])->name('Change.Password');
    // deposit page
    Route::get('/Deposit', [DepositController::class, 'addDeposit'])->name('Deposit.Method');
    Route::get('Approve/Deposit/{id}', [DepositController::class, 'approveDeposit'])->name('Approve.Deposit');
    Route::get('Reject/Deposit/{id}', [DepositController::class, 'rejectDeposit'])->name('Reject.Deposit');
    Route::post('/Store/Deposit/Method', [DepositController::class, 'storeWallet'])->name('Store.Method');
    Route::get('/All/Deposit/Method', [DepositController::class, 'allMethod'])->name('All.Method');
    Route::get('/Edit/Deposit/Method/{id}', [DepositController::class, 'editMethod'])->name('Edit.Method');
    Route::post('/Update/Deposit/Method/{id}', [DepositController::class, 'updateMethod'])->name('Update.Method');
    Route::get('/Delete/Deposit/Method/{id}', [DepositController::class, 'deleteMethod'])->name('Delete.Method');
    Route::get('/Deposit/Requests', [DepositController::class, 'depositRequests'])->name('Deposit.Requests');
    Route::get('/Approved/Deposit/Requests', [DepositController::class, 'approveDepositRequests'])->name('Approved.Deposit.Requests');
    // users
    Route::get('Edit/User/{id}', [AdminDashboardController::class, 'editUser'])->name('Edit.User');
    Route::post('Update/User/{id}', [AdminDashboardController::class, 'updateUser'])->name('Update.User');
    Route::get('Disable/User/{id}', [AdminDashboardController::class, 'disable'])->name('Disable.User');
    Route::get('Active/User/{id}', [AdminDashboardController::class, 'active'])->name('Active.User');
    // withdraw
    Route::get('Withdraw/Request', [AdminDashboardController::class, 'withdrawRequest'])->name('Withdraw.Request');
    Route::get('Rejected/Withdraws', [AdminDashboardController::class, 'rejectedrequest'])->name('Rejected.Withdraws');
    Route::get('Approved/Withdraws', [AdminDashboardController::class, 'approvedRequest'])->name('Approved.Withdraws');
    Route::get('Approve/Withdraw/{id}', [AdminDashboardController::class, 'approveWithdraw'])->name('Approve.Withdraw');
    Route::get('Reject/Withdraw/{id}', [AdminDashboardController::class, 'rejectWithdraw'])->name('Reject.Withdraw');
    // user mangement
    Route::get('User/All/Tasks/{id}', [UserManagement::class, 'manage'])->name('All.Tasks.This.User');
    Route::post('Trigger/Task/{id}', [UserManagement::class, 'triggerTask'])->name('Triger.Task');
    Route::post('Edit/Task/Profit/{id}', [UserManagement::class, 'editTaskProfit'])->name('Edit.Task.Profit');
    // Activate all tasks
    Route::get('Activate/All/Task/{id}', [UserManagement::class, 'activateAll'])->name('Activate.All.Plans');
    Route::get('Activate/Non/Deposit/User/Tasks/{id}', [UserManagement::class, 'nonDeposit'])->name('Non.Deposit.User.Task');
    // content management
    Route::get('Add/Telegram/Link', [ContentManagement::class, 'addTelegramLink'])->name('Add.Telegram.Link');
    Route::Post('Store/Telegram/Link', [ContentManagement::class, 'storeTelegramLink'])->name('Store.Telegram.Link');
});
