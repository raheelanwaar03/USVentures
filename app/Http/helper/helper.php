<?php

use App\Models\admin\DailyTask;
use App\Models\User;

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

function today_profit()
{
 $amount = 90;
 return $amount;
}
