<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\DailyTask;
use App\Models\User;
use App\Models\user\DepositAmount;
use App\Models\user\Withdraw;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $deposit = DepositAmount::get();
        return view('admin.dashboard', compact('deposit'));
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.user.editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        // fetching user and updating new data
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->level = $request->level;
        $user->save();
        return redirect()->route('Admin.Users')->with('success', 'User Updated Successfully');
    }

    public function disable($id)
    {
        $user = User::find($id);
        $user->status = 'disable';
        $user->save();
        return redirect()->route('Admin.Users')->with('success', 'User Disabled Successfully');
    }

    public function active($id)
    {
        $user = User::find($id);
        $user->status = 'active';
        $user->save();
        return redirect()->route('Admin.Users')->with('success', 'User Activated Successfully');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function addTask()
    {
        return view('admin.addTask');
    }

    public function allTasks()
    {
        $tasks = DailyTask::all();
        return view('admin.allTasks', compact('tasks'));
    }

    public function storeTask(Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'link' => 'required',
            'level' => 'required',
            'profit' => 'required',
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
        ]);
        // save image with unique name
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        // save data to database
        $task = new DailyTask();
        $task->name = $request->name;
        $task->price = $request->price;
        $task->link = $request->link;
        $task->level = $request->level;
        $task->profit = $request->profit;
        $task->image = $imageName;
        $task->save();
        // redirect to add task page
        return redirect()->route('Admin.Add.Task')->with('success', 'Task Added Successfully');
    }

    public function changeStatus($id)
    {
        $task = DailyTask::find($id);
        $task->status = 'active';
        $task->save();
        return redirect()->route('Admin.All.Task');
    }

    public function withdrawRequest()
    {
        $withdraw = Withdraw::get();
        return view('admin.withdraw', compact('withdraw'));
    }
}
