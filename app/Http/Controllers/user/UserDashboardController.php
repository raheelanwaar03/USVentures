<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function record()
    {
        return view('user.record');
    }
}
