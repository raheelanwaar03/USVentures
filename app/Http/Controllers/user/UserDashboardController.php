<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\AdminWallet;
use App\Models\admin\DailyTask;
use App\Models\User;
use App\Models\user\AddWallet;
use App\Models\user\CompletedTask;
use App\Models\user\DepositAmount;
use App\Models\user\Transcations;
use App\Models\user\UserDailyTasks;
use App\Models\user\UserTodayTasks;
use App\Models\user\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function start()
    {
        return view('user.start');
    }

    public function record()
    {
        $user = User::find(auth()->user()->id);
        if ($user->status == 'active') {
            $tasks = UserDailyTasks::where('user_id', auth()->user()->id)->where('status', 'finish')->get();
            return view('user.record', compact('tasks'));
        } else {
            return redirect()->route('User.Dashboard')->with('error', 'Contact Customer Service');
        }
    }

    public function completedRecord()
    {
        $user = User::find(auth()->user()->id);
        if ($user->status == 'active') {
            $tasks = UserDailyTasks::where('user_id', auth()->user()->id)->where('status', 'finish')->get();
            return view('user.completedRecord', compact('tasks'));
        } else {
            return redirect()->route('User.Dashboard')->with('error', 'Contact Customer Service');
        }
    }

    public function rejectedRecord()
    {
        $user = User::find(auth()->user()->id);
        if ($user->status == 'active') {
            $tasks = UserDailyTasks::where('user_id', auth()->user()->id)->where('status', 'rejected')->get();
            return view('user.rejectedRecord', compact('tasks'));
        } else {
            return redirect()->route('User.Dashboard')->with('error', 'Contact Customer Service');
        }
    }

    public function addTaskAmount()
    {
        $check_tasks = UserTodayTasks::where('user_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->get();

        // if check_tasks is empty then return back
        if ($check_tasks->isEmpty()) {
            return 1;
        } else {
            return 2;
        }


        $id = today_tasks() + 1;
        // check if all tasks are finished
        $allTasks = DailyTask::all()->count('id');

        if ($id > $allTasks) {
            return back()->with('error', 'All tasks are finished, Contact Customer Service');
        }

        $task = DailyTask::find($id);
        // add profit to user account
        $user = User::find(auth()->user()->id);
        $user->balance += $task->profit;
        $user->save();

        $userDailyTask = new UserDailyTasks();
        $userDailyTask->user_id = auth()->user()->id;
        $userDailyTask->task_id = $task->id;
        $userDailyTask->profit = $task->profit;
        $userDailyTask->task_text = $task->name;
        $userDailyTask->task_img = $task->image;
        $userDailyTask->total_amount = $task->price;
        $userDailyTask->save();

        // add in transaction table
        $transcation = new Transcations();
        $transcation->user_id = auth()->user()->id;
        $transcation->amount = $task->profit;
        $transcation->type = 'Order grabbing commission';
        $transcation->status = 'credit';
        $transcation->save();

        // add in deducted task
        $transcation = new Transcations();
        $transcation->user_id = auth()->user()->id;
        $transcation->amount = $task->price;
        $transcation->type = 'Order grabbing frozen amount';
        $transcation->status = 'debit';
        $transcation->save();


        return back()->with('success', 'Amount added successfully');
    }

    public function Withdraw()
    {
        // check if user has added his wallet or not
        $wallet = AddWallet::where('user_id', auth()->user()->id)->first();
        return view('user.withdraw', compact('wallet'));
    }

    public function storeWithdraw(Request $request)
    {
        $wallet = AddWallet::where('user_id', auth()->user()->id)->first();
        if (!$wallet) {
            return back()->with('error', 'Add your wallet address');
        }

        $user = User::find(auth()->user()->id);
        if ($user->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance');
        }
        // check if pin is correct
        if ($user->pin != $request->pin) {
            return back()->with('error', 'Incorrect pin');
        }

        // save data to database
        $withdraw = new Withdraw();
        $withdraw->user_id = auth()->user()->id;
        $withdraw->name = $wallet->name;
        $withdraw->address = $wallet->address;
        $withdraw->wallet = $wallet->walletname;
        $withdraw->amount = $request->amount;
        $withdraw->pin = $request->pin;
        $withdraw->save();

        // add to transcations
        $transcation = new Transcations();
        $transcation->user_id = auth()->user()->id;
        $transcation->amount = $request->amount;
        $transcation->type = 'Withdraw';
        $transcation->status = 'pending';
        $transcation->save();

        return redirect()->route('User.Dashboard')->with('success', 'Withdraw request sent successfully');
    }

    // deposit money
    public function deposit()
    {
        $wallet = AdminWallet::all();
        return view('user.deposit', compact('wallet'));
    }

    // deposit amount
    public function depositAmount(Request $request)
    {
        $request->validate([
            'amount' => 'required',
        ]);

        // save to database
        $deposit = DepositAmount::create([
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'phone' => auth()->user()->phone,
            'amount' => $request->amount,
        ]);

        $transcation = new Transcations();
        $transcation->user_id = auth()->user()->id;
        $transcation->amount = $request->amount;
        $transcation->type = 'Deposit';
        $transcation->status = 'pending';
        $transcation->save();
        return redirect()->back()->with('success', 'Deposit request sent successfully');
    }

    public function transactions()
    {
        // get today transcations
        $transcations = Transcations::where('user_id', auth()->user()->id)->whereDate('created_at', Carbon::today())->get();
        return view('user.transactions', compact('transcations'));
    }

    public function addWallet(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'walletname' => 'required',
        ]);

        // save to database
        $wallet = new AddWallet();
        $wallet->user_id = auth()->user()->id;
        $wallet->name = $request->name;
        $wallet->address = $request->address;
        $wallet->walletname = $request->walletname;
        $wallet->save();
        return redirect()->back()->with('success', 'Wallet added successfully');
    }
}
