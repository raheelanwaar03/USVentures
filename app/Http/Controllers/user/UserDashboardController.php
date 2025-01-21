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
use App\Models\user\Withdraw;
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
            $tasks = DailyTask::where('user_id', auth()->user()->id)->where('level', auth()->user()->level)->where('status', 'active')->get();
            return view('user.record', compact('tasks'));
        } else {
            return redirect()->route('User.Dashboard')->with('error', 'Contact Customer Service');
        }
    }

    public function completedRecord()
    {
        $user = User::find(auth()->user()->id);
        if ($user->status == 'active') {
            $tasks = DailyTask::get();
            return $tasks;
            return view('user.completedRecord', compact('tasks'));
        } else {
            return redirect()->route('User.Dashboard')->with('error', 'Contact Customer Service');
        }
    }

    public function rejectedRecord()
    {
        $user = User::find(auth()->user()->id);
        if ($user->status == 'active') {
            $tasks = DailyTask::where('level', auth()->user()->level)->where('status', 'rejected')->get();
            return view('user.rejectedRecord', compact('tasks'));
        } else {
            return redirect()->route('User.Dashboard')->with('error', 'Contact Customer Service');
        }
    }

    public function addTaskAmount(Request $request, $id)
    {
        $task = DailyTask::find($id);
        $amount = $task->profit;
        $task->status = 'completed';
        $task->save();

        // check if user has completed this task today
        $completed = CompletedTask::where('task_id', $id)->where('completed_at', date('Y-m-d'))->first();
        if (!$completed) {
            $completed = new CompletedTask();
            $completed->user_id = auth()->user()->id;
            $completed->task_id = $id;
            $completed->completed_at = date('Y-m-d');
            $completed->save();
            // add to transcations
            $transcation = new Transcations();
            $transcation->user_id = auth()->user()->id;
            $transcation->amount = $amount;
            $transcation->type = 'Bonus';
            $transcation->status = 'Credit';
            $transcation->save();

            // add to user account
            $user = User::where('id', auth()->user()->id)->first();
            $user->balance += $amount;
            $user->save();
        } else {
            return back()->with('error', 'You have already completed this task today');
        }

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
        $user = User::find(auth()->user()->id);
        if ($user->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance');
        }
        // check if pin is correct
        if ($user->pin != $request->pin) {
            return back()->with('error', 'Incorrect pin');
        }

        // fetch user wallet
        $wallet = AddWallet::where('user_id', auth()->user()->id)->first();
        if (!$wallet) {
            return back()->with('error', 'Add your wallet address');
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
        $transcations = Transcations::where('user_id', auth()->user()->id)->get();
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
