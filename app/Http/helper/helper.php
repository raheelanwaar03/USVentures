<?php

use App\Models\admin\DailyTask;
use App\Models\User;
use App\Models\user\UserDailyTasks;

function total_team()
{
    $users = User::where('referral', auth()->user()->referral_id)->count();
    return $users;
}

function tasks()
{
    $tasks = DailyTask::where('level', auth()->user()->level)->count();
    return $tasks;
}

// today tasks
function today_tasks()
{
    $tasks = UserDailyTasks::where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->count();
    return $tasks;
}

function today_profit()
{
    $amount = UserDailyTasks::where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->sum('profit');
    return $amount;
}
