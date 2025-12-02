<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\AdminWallet;
use App\Models\admin\DailyTask;
use App\Models\admin\TelegramLink;
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
        $telegram = TelegramLink::first();
        return view('user.dashboard', compact('telegram'));
    }

    public function start()
    {
        $telegram = TelegramLink::first();
        return view('user.start', compact('telegram'));
    }

    public function record()
    {
        $user = User::find(auth()->user()->id);
        if ($user->status == 'active') {
            $tasks = UserDailyTasks::where('user_id', auth()->user()->id)->get();
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

    public function submitRecord()
    {
        $user = User::find(auth()->user()->id);
        if ($user->status == 'active') {
            $tasks = UserDailyTasks::where('user_id', auth()->user()->id)->where('status', 'submit')->get();
            return view('user.submit', compact('tasks'));
        } else {
            return redirect()->route('User.Dashboard')->with('error', 'Contact Customer Service');
        }
    }

    public function rejectedRecord()
    {
        $user = User::find(auth()->user()->id);
        if ($user->status == 'active') {
            $tasks = UserDailyTasks::where('user_id', auth()->user()->id)->where('status', 'proccessing')->get();
            return view('user.rejectedRecord', compact('tasks'));
        } else {
            return redirect()->route('User.Dashboard')->with('error', 'Contact Customer Service');
        }
    }

    public function addTaskAmount()
    {
        $check_tasks = UserTodayTasks::where('user_id', auth()->user()->id)->get();
        // if check_tasks is empty then return back
        if ($check_tasks->isEmpty()) {
            $id = completed_tasks() + 1;
            // check if all tasks are finished
            $allTasks = DailyTask::where('level', auth()->user()->level)->count('id');
            if ($id > $allTasks) {
                return back()->with('error', 'All tasks are finished, Contact Customer Service');
            }

            $task = DailyTask::find($id);
            // add profit to user account
            $user = User::find(auth()->user()->id);
            if ($user->balance <= 0) {
                return back()->with('error', 'Recharge your account');
            }
            $user->balance += $task->profit;
            $user->save();

            $userDailyTask = new UserDailyTasks();
            $userDailyTask->user_id = auth()->user()->id;
            $userDailyTask->task_id = $task->id;
            $userDailyTask->profit = $task->profit;
            $userDailyTask->task_text = $task->title;
            $userDailyTask->task_img = $task->image;
            $userDailyTask->total_amount = $task->order_amount;
            $userDailyTask->save();

            // add in transaction table
            $transcation = new Transcations();
            $transcation->user_id = auth()->user()->id;
            $transcation->amount = $task->profit;
            $transcation->type = 'Order grabbing commission';
            $transcation->status = 'credit';
            $transcation->save();

            $transcation = new Transcations();
            $transcation->user_id = auth()->user()->id;
            $transcation->amount = $task->order_amount;
            $transcation->type = 'Order frozen amount';
            $transcation->status = 'debit';
            $transcation->save();
        }
        // when admin set user tasks
        else {
            // when tasks are finished give upliner commission
            if (completed_tasks() == user_today_total_task()) {
                // get user today task profit's 20%
                $upliner_commission = today_profit() * 20 / 100;
                // give user upliner reward
                $user = User::find(auth()->user()->id);
                $upliner = User::where('referral_id', $user->referral)->first();
                // check if user got today commision then return back
                $check_today_upliner_commission = Transcations::where('user_id', $upliner->id)
                    ->whereDate('created_at', Carbon::today())->first();
                if ($check_today_upliner_commission) {
                    return back()->with('error', 'All Tasks are finished, Contact Customer Service');
                }
                // add upliner commission to user account
                $upliner->balance += $upliner_commission;
                $upliner->save();
                $transcation = new Transcations();
                $transcation->user_id = $upliner->id;
                $transcation->amount = $upliner_commission;
                $transcation->type = 'Referral commission';
                $transcation->status = 'credit';
                $transcation->save();
                return back()->with('error', 'All tasks are finished, Contact Customer Service');
            }
            $test = UserTodayTasks::where('user_id', auth()->user()->id)->where('level', auth()->user()->level)->get();
            $first_id = $test->first()->id;
            $id = $first_id + user_task_id();

            $task = UserTodayTasks::where('id', $id)->where('user_id', auth()->user()->id)->first();

            if ($task == null) {
                return redirect()->back()->with('error', 'Contact CS team to active your tasks');
            }

            if ($task->task_id == null) {
                $given_commission = $task->commission;
                // check if user balance is negtive
                $user = User::find(auth()->user()->id);
                if ($user->balance <= 0) {
                    return back()->with('error', 'Recharge your account');
                }
                $user->balance += $given_commission;
                $user->save();
                $task = UserTodayTasks::where('user_id', auth()->user()->id)->where('id', $id)->first();
                $task->status = 'completed';
                $task->save();

                $userDailyTask = new UserDailyTasks();
                $userDailyTask->user_id = auth()->user()->id;
                $userDailyTask->task_id = $task->id;
                $userDailyTask->profit = $given_commission;
                $userDailyTask->task_text = $task->title;
                $userDailyTask->task_img = $task->image;
                $userDailyTask->total_amount = $task->order_amount;
                $userDailyTask->save();

                $transcation = new Transcations();
                $transcation->user_id = auth()->user()->id;
                $transcation->amount = $given_commission;
                $transcation->type = 'Order grabbing commission';
                $transcation->status = 'credit';
                $transcation->save();

                // frozen amount
                $transcation = new Transcations();
                $transcation->user_id = auth()->user()->id;
                $transcation->amount = $task->order_amount;
                $transcation->type = 'Order frozen amount';
                $transcation->status = 'debit';
                $transcation->save();
            } else {
                $task = UserTodayTasks::find($id);
                $task->status = 'completed';
                $task->save();
                $given_commission = $task->order_amount * $task->commission / 100;

                // deduct order amount from user balance
                $user = User::where('id', auth()->user()->id)->first();
                $user->balance -= $task->order_amount;
                $user->save();
                $transcation = new Transcations();
                $transcation->user_id = auth()->user()->id;
                $transcation->amount = $task->order_amount;
                $transcation->type = 'Order consumed amount';
                $transcation->status = 'debit';
                $transcation->save();

                // add user commission into user account
                $transcation = new Transcations();
                $transcation->user_id = auth()->user()->id;
                $transcation->amount = $given_commission;
                $transcation->type = 'Order frozen commission';
                $transcation->status = 'debit';
                $transcation->save();

                $userDailyTask = new UserDailyTasks();
                $userDailyTask->user_id = auth()->user()->id;
                $userDailyTask->task_id = $task->id;
                $userDailyTask->profit = $given_commission;
                $userDailyTask->task_text = $task->title;
                $userDailyTask->task_img = $task->image;
                $userDailyTask->total_amount = $task->order_amount;
                $userDailyTask->status = 'proccessing';
                $userDailyTask->save();
            }

            // add profit to user account

        }

        return back()->with('success', 'Amount added successfully');
    }

    public function Withdraw()
    {
        // check if user has added his wallet or not
        $telegram = TelegramLink::first();
        $wallet = AddWallet::where('user_id', auth()->user()->id)->first();
        return view('user.withdraw', compact('wallet', 'telegram'));
    }

    public function storeWithdraw(Request $request)
    {
        // check if user status is disable then return it back
        if (auth()->user()->status == 'disable') {
            return back()->with('error', 'Your account is disable, Contact CS');
        }

        $wallet = AddWallet::where('user_id', auth()->user()->id)->first();
        if (!$wallet) {
            return back()->with('error', 'Add your wallet address');
        }
        // check if user has already requested for withdrawal
        $withdrawal = Withdraw::where('user_id', auth()->user()->id)->where('status', 'pending')->first();
        if ($withdrawal) {
            return back()->with('error', 'You have already requested for withdrawal');
        }
        $user = User::find(auth()->user()->id);
        if ($user->pin != $request->pin) {
            return back()->with('error', 'Incorrect pin');
        }
        if ($user->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance');
        }

        if ($request->amount < 50) {
            return back()->with('error', 'Minimum withdraw limit is 50 usdt');
        }

        // check user level and his withdraw limit accourdingly
        if ($user->level == 'vip1') {
            // user limit should be between 100 to 800
            if ($request->amount < 100 || $request->amount > 800) {
                return back()->with('error', 'Withdraw limit is between 100 to 800 for your level');
            }
        } elseif ($user->level == 'vip2') {
            if ($request->amount < 500 || $request->amount > 3000) {
                return back()->with('error', 'Withdraw limit is between 500 to 3000 for your level');
            }
        } elseif ($user->level == 'vip3') {
            if ($request->amount < 1500 || $request->amount > 10000) {
                return back()->with('error', 'Withdraw limit is between 1500 to 10000 for your level');
            }
        } elseif ($user->level == 'vip4') {
            if ($request->amount < 5000) {
                return back()->with('error', 'You cannot withdraw less than 5000');
            }
        }

        // deduct balance from user account
        $user = User::find(auth()->user()->id);
        $user->balance -= $request->amount;
        $user->save();

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
        $telegram = TelegramLink::first();
        $wallet = AdminWallet::first();
        return view('user.deposit', compact('wallet', 'telegram'));
    }

    // deposit amount
    public function depositAmount(Request $request)
    {
        $request->validate([
            'amount' => 'numeric',
            'trx_id' => 'numeric',
            'screen_shot' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        if ($request->amount < 100) {
            return redirect()->back()->with('error', 'Minimum deposit is 100 usdt.');
        }

        $imageName = time() . '.' . $request->screen_shot->extension();
        $request->screen_shot->move(public_path('images'), $imageName);

        // save to database
        $deposit = new DepositAmount();
        $deposit->user_id = auth()->user()->id;
        $deposit->name = auth()->user()->name;
        $deposit->trx_id = $request->trx_id;
        $deposit->amount = $request->amount;
        $deposit->screen_shot = $request->screen_shot;
        $deposit->save();


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
            'wallet_type' => 'required',
        ]);

        // check if user already added his wallet then delete the old wallet
        $user_wallet = AddWallet::where('user_id', auth()->user()->id)->first();
        if ($user_wallet) {
            $user_wallet->delete();
        }

        // save to database
        $wallet = new AddWallet();
        $wallet->user_id = auth()->user()->id;
        $wallet->name = $request->name;
        $wallet->address = $request->address;
        $wallet->walletname = $request->wallet_type;
        $wallet->save();
        return redirect()->back()->with('success', 'New Wallet Added Successfully');
    }

    public function submitAllRecord($id)
    {
        // fetch all tasks where user_id = $id
        $tasks = UserDailyTasks::where('user_id', $id)->where('status', 'submit')->get();
        // loop through each task
        foreach ($tasks as $task) {
            // update status to completed
            $task->status = 'Finish';
            $task->save();
            $user = User::find($id);
            $user->balance += $task->total_amount + $task->profit;
            $user->save();
        }
        return redirect()->back()->with('success', 'All tasks submitted successfully');
    }

    public function team()
    {
        $referrals = User::where('referral', auth()->user()->referral_id)->get();
        return view('user.team', compact('referrals'));
    }
}
