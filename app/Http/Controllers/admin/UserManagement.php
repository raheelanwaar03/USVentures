<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\DailyTask;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagement extends Controller
{
    public function manage($id)
    {
        $user = User::find($id);
        $tasks = DailyTask::where('level', $user->level)->get();
        return view('admin.task.management',compact('user','tasks'));
    }

    public function triggerTask(Request $request,$id)
    {
        return $request;
    }


}
