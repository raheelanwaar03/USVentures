<?php

use App\Models\User;

function total_team()
{
    $users = User::where('referral', auth()->user()->referral_id)->get()->count();
    return $users;
}
