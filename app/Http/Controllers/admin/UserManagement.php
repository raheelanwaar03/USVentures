<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\DailyTask;
use App\Models\User;
use App\Models\user\DepositAmount;
use App\Models\user\UserDailyTasks;
use App\Models\user\UserTodayTasks;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserManagement extends Controller
{
    public function manage($id)
    {
        $user = User::find($id);
        // user deposit
        $deposit = DepositAmount::where('user_id', $user->id)->get();
        $user_total_deposit = 0;
        foreach ($deposit as $d) {
            $user_total_deposit += $d->amount;
        }

        // check user level and then give user commisson
        if ($user->level == 'vip1') {
            // task profit
            $task_profit = $user_total_deposit * 0.004;
            $tasks = DailyTask::where('level', $user->level)->get();

            // check if daily tasks added to usertodaytasks today
            $task_check = UserTodayTasks::where('user_id', $user->id)->where('level', $user->level)->get();
            if ($task_check->count() !== $tasks->count()) {
                // delete old tasks
                $old_task = UserTodayTasks::where('user_id', $user->id)->get();
                foreach ($old_task as $old_task) {
                    $old_task->delete();
                }
                foreach ($tasks as $task) {
                    $today_task = new UserTodayTasks();
                    $today_task->user_id = $user->id;
                    $today_task->title = $task->title;
                    $today_task->order_amount = $task->order_amount;
                    $today_task->commission = $task_profit;
                    $today_task->level = $task->level;
                    $today_task->image = $task->image;
                    $today_task->save();
                }

                $completed_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'completed')->count();
                $active_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'active')->count();
                if ($active_tasks == 0) {
                    $active_tasks = 0;
                }
                $today_tasks = UserTodayTasks::where('user_id', $user->id)->get();
                return view('admin.task.management', compact('user', 'today_tasks', 'active_tasks', 'completed_tasks'));
            } else {
                $completed_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'completed')->count();
                $active_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'active')->count();
                $today_tasks = UserTodayTasks::where('user_id', $user->id)->get();
                return view('admin.task.management', compact('user', 'today_tasks', 'active_tasks', 'completed_tasks'));
            }
        }
        // if user level is vip2
        elseif ($user->level == 'vip2') {
            // task profit
            $task_profit = $user_total_deposit * 0.004;
            $tasks = DailyTask::where('level', $user->level)->get();

            // check if daily tasks added to usertodaytasks today
            $task_check = UserTodayTasks::where('user_id', $user->id)->where('level', $user->level)->get();
            if ($task_check->count() !== $tasks->count()) {
                // delete old tasks
                $old_task = UserTodayTasks::where('user_id', $user->id)->get();
                foreach ($old_task as $old_task) {
                    $old_task->delete();
                }
                foreach ($tasks as $task) {
                    $today_task = new UserTodayTasks();
                    $today_task->user_id = $user->id;
                    $today_task->title = $task->title;
                    $today_task->order_amount = $task->order_amount;
                    $today_task->commission = $task_profit;
                    $today_task->level = $task->level;
                    $today_task->image = $task->image;
                    $today_task->save();
                }

                $completed_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'completed')->count();
                $active_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'active')->count();
                if ($active_tasks == 0) {
                    $active_tasks = 0;
                }
                $today_tasks = UserTodayTasks::where('user_id', $user->id)->get();
                return view('admin.task.management', compact('user', 'today_tasks', 'active_tasks', 'completed_tasks'));
            } else {
                $completed_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'completed')->count();
                $active_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'active')->count();
                $today_tasks = UserTodayTasks::where('user_id', $user->id)->get();
                return view('admin.task.management', compact('user', 'today_tasks', 'active_tasks', 'completed_tasks'));
            }
        }
        // if user level is vip3
        elseif ($user->level == 'vip3') {
            // task profit
            $task_profit = $user_total_deposit * 0.004;
            $tasks = DailyTask::where('level', $user->level)->get();

            // check if daily tasks added to usertodaytasks today
            $task_check = UserTodayTasks::where('user_id', $user->id)->where('level', $user->level)->get();
            if ($task_check->count() !== $tasks->count()) {
                // delete old tasks
                $old_task = UserTodayTasks::where('user_id', $user->id)->get();
                foreach ($old_task as $old_task) {
                    $old_task->delete();
                }
                foreach ($tasks as $task) {
                    $today_task = new UserTodayTasks();
                    $today_task->user_id = $user->id;
                    $today_task->title = $task->title;
                    $today_task->order_amount = $task->order_amount;
                    $today_task->commission = $task_profit;
                    $today_task->level = $task->level;
                    $today_task->image = $task->image;
                    $today_task->save();
                }

                $completed_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'completed')->count();
                $active_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'active')->count();
                if ($active_tasks == 0) {
                    $active_tasks = 0;
                }
                $today_tasks = UserTodayTasks::where('user_id', $user->id)->get();
                return view('admin.task.management', compact('user', 'today_tasks', 'active_tasks', 'completed_tasks'));
            } else {
                $completed_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'completed')->count();
                $active_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'active')->count();
                $today_tasks = UserTodayTasks::where('user_id', $user->id)->get();
                return view('admin.task.management', compact('user', 'today_tasks', 'active_tasks', 'completed_tasks'));
            }
        }
        // if user level is vip4
        elseif ($user->level == 'vip4') {
            // task profit
            $task_profit = $user_total_deposit * 0.004;
            $tasks = DailyTask::where('level', $user->level)->get();

            // check if daily tasks added to usertodaytasks today
            $task_check = UserTodayTasks::where('user_id', $user->id)->where('level', $user->level)->get();
            if ($task_check->count() !== $tasks->count()) {
                // delete old tasks
                $old_task = UserTodayTasks::where('user_id', $user->id)->get();
                foreach ($old_task as $old_task) {
                    $old_task->delete();
                }
                foreach ($tasks as $task) {
                    $today_task = new UserTodayTasks();
                    $today_task->user_id = $user->id;
                    $today_task->title = $task->title;
                    $today_task->order_amount = $task->order_amount;
                    $today_task->commission = $task_profit;
                    $today_task->level = $task->level;
                    $today_task->image = $task->image;
                    $today_task->save();
                }

                $completed_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'completed')->count();
                $active_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'active')->count();
                if ($active_tasks == 0) {
                    $active_tasks = 0;
                }
                $today_tasks = UserTodayTasks::where('user_id', $user->id)->get();
                return view('admin.task.management', compact('user', 'today_tasks', 'active_tasks', 'completed_tasks'));
            } else {
                $completed_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'completed')->count();
                $active_tasks = UserTodayTasks::where('user_id', $user->id)->where('status', 'active')->count();
                $today_tasks = UserTodayTasks::where('user_id', $user->id)->get();
                return view('admin.task.management', compact('user', 'today_tasks', 'active_tasks', 'completed_tasks'));
            }
        }
    }

    public function activateAll($id)
    {
        $user = User::find($id);
        // find all tasks of this user
        $tasks = UserTodayTasks::where('user_id', $user->id)->get();
        // make status approved
        foreach ($tasks as $task) {
            $task->status = 'active';
            $task->save();
        }
        // delete all old tasks of this user
        $this_user = UserDailyTasks::where('user_id', $id)->where('status', 'Finish')->get();
        foreach ($this_user as $task) {
            $task->delete();
        }

        return redirect()->back()->with('success', 'All tasks are activated');
    }

    public function triggerTask(Request $request, $id)
    {
        $task = UserTodayTasks::find($id);
        $task->task_id = $id;
        $task->order_amount = $request->order_amount;
        $task->commission = $request->commission;
        $task->save();
        return redirect()->back()->with('success', 'Task is Trigger');
    }
}
