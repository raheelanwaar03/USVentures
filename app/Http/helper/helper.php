<?php

use App\Models\admin\DailyTask;
use App\Models\User;
use App\Models\user\UserDailyTasks;
use App\Models\user\UserTodayTasks;
use Carbon\Carbon;

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
    $tasks = UserTodayTasks::where('user_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->count();
    return $tasks;
}

function completed_tasks()
{
    $completed_tasks = UserDailyTasks::where('user_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->count();
    return $completed_tasks;
}

function today_profit()
{
    $amount = UserDailyTasks::where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->sum('profit');
    return $amount;
}
