<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\DailyTask;
use App\Models\User;
use App\Models\user\UserTodayTasks;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserManagement extends Controller
{
    public function manage($id)
    {
        $user = User::find($id);
        $tasks = DailyTask::where('level', $user->level)->get();

        // check if daily tasks added to usertodaytasks today
        $task_check = UserTodayTasks::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->first();
        if ($task_check == null) {
            // store all tasks into UserTodayTasks
            foreach ($tasks as $task) {
                $today_task = new UserTodayTasks();
                $today_task->user_id = $user->id;
                $today_task->title = $task->title;
                $today_task->order_amount = $task->order_amount;
                $today_task->commission = $task->profit;
                $today_task->level = $task->level;
                $today_task->image = $task->image;
                $today_task->save();
            }
        } else {
            $today_tasks = UserTodayTasks::where('user_id', $user->id)->get();
            return view('admin.task.management', compact('user', 'today_tasks'));
        }
    }

    public function triggerTask(Request $request, $id)
    {
        return $request;
    }
}
