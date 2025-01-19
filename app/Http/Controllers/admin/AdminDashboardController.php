<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\DailyTask;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
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
        $task->profit = $request->profit;
        $task->image = $imageName;
        $task->save();
        // redirect to add task page
        return redirect()->route('Admin.Add.Task');
    }
}
