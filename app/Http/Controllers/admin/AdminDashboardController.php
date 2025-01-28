<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\DailyTask;
use App\Models\User;
use App\Models\user\DepositAmount;
use App\Models\user\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $user->balance = $request->balance;
        $user->level = $request->level;
        $user->save();
        return redirect()->route('Admin.Users')->with('success', 'User Updated Successfully');
    }

    public function addDepositAmount(Request $request, $id)
    {
        $user = User::find($id);
        $user->balance = $request->amount;
        $user->save();
        // deposit request
        $deposit = new DepositAmount();
        $deposit->user_id = $user->id;
        $deposit->name = $user->name;
        $deposit->amount = $request->amount;
        $deposit->phone = $user->phone;
        $deposit->status = 'approved';
        $deposit->save();
        return redirect()->back()->with('success', 'Deposit added to user account successfully');
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
        return view('admin.task.addTask');
    }

    public function allTasks()
    {
        $tasks = DailyTask::all();
        return view('admin.task.allTasks', compact('tasks'));
    }

    public function editTask($id)
    {
        $task = DailyTask::find($id);
        return view('admin.task.editTask', compact('task'));
    }

    public function updateTask(Request $request, $id)
    {
        $task = DailyTask::find($id);
        $task->title = $request->title;
        $task->order_amount = $request->order_amount;
        $task->profit = $request->profit;
        $task->level = $request->level;
        if ($request->image) {
            // delete old image
            $oldImage = $task->image;
            if (file_exists(public_path('images/' . $oldImage))) {
                unlink(public_path('images/' . $oldImage));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $task->image = $imageName;
        }
        $task->save();
        return redirect()->back()->with('success', 'Task Updated Successfully');
    }

    public function deleteTask($id)
    {
        // delete task
        $task = DailyTask::find($id);
        $task->delete();
        return redirect()->route('Admin.All.Task')->with('success', 'Task Deleted Successfully');
    }

    public function storeTask(Request $request)
    {
        // validate request
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'level' => 'required',
            'profit' => 'required',
            'image' => 'required|image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048',
        ]);
        // save image with unique name
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        // save data to database
        $task = new DailyTask();
        $task->title = $request->name;
        $task->order_amount = $request->price;
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

    public function approveWithdraw($id)
    {
        $withdraw = Withdraw::find($id);
        $withdraw->status = 'approved';
        $withdraw->save();
        // deduct amount from user account
        $user = User::find($withdraw->user_id);
        $user->balance -= $withdraw->amount;
        $user->save();

        return redirect()->route('Admin.Withdraw.Request')->with('success', 'Withdraw Approved Successfully');
    }

    public function rejectWithdraw($id)
    {
        $withdraw = Withdraw::find($id);
        $withdraw->status = 'rejected';
        $withdraw->save();
        return redirect()->route('Admin.Withdraw.Request')->with('success', 'Withdraw Rejected Successfully');
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);
        // make password hash
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('Admin.Users')->with('success', 'Password Changed Successfully');
    }
}
