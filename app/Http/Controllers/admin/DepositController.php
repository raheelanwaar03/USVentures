<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\AdminWallet;
use App\Models\User;
use App\Models\user\DepositAmount;
use App\Models\user\Transcations;
use App\Models\user\UserDailyTasks;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function addDeposit()
    {
        return view('admin.deposit.addMethod');
    }

    public function depositRequests()
    {
        $deposit = DepositAmount::get();
        return view('admin.deposit.depositRequests', compact('deposit'));
    }

    public function approveDeposit($id)
    {
        $deposit = DepositAmount::find($id);
        if ($deposit->status == 'approved') {
            return redirect()->back()->with('error', 'This deposit is already approved');
        }
        $deposit->status = 'approved';
        $deposit->save();

        // give user upliner 20% bouns
        $commission = $deposit->amount * 20 / 100;
        $user =  User::find($deposit->user_id);
        $upliner = User::where('referral_id', $user->referral)->first();
        // user commission
        $upliner->balance += $commission;

        // add in upliner transcations
        $bouns = new Transcations();
        $bouns->user_id = $upliner->id;
        $bouns->amount = $commission;
        $bouns->type = 'Referral Commission';
        $bouns->type = 'credit';
        $bouns->save();


        $tasks = UserDailyTasks::where('user_id', $deposit->user_id)->where('status', 'proccessing')->get();
        if (!$tasks->isEmpty()) {
            foreach ($tasks as $task) {
                $task->status = 'submit';
                $task->save();
            }
        }

        return redirect()->back()->with('success', 'Deposit approved successfully');
    }

    public function rejectDeposit($id)
    {
        $deposit = DepositAmount::find($id);
        $deposit->status = 'rejected';
        $deposit->save();
        return redirect()->back()->with('success', 'Deposit approved successfully');
    }

    public function storeWallet(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'address' => 'required',
            'logo' => 'required',
        ]);

        // save image
        $imageName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('images/logo'), $imageName);
        // save to databasE
        $wallet = new AdminWallet();
        $wallet->name = $request->name;
        $wallet->username = $request->username;
        $wallet->address = $request->address;
        $wallet->logo = $imageName;
        $wallet->save();
        return redirect()->back()->with('success', 'Wallet added successfully');
    }

    public function allMethod()
    {
        $wallets = AdminWallet::all();
        return view('admin.deposit.allMethod', compact('wallets'));
    }

    public function editMethod($id)
    {
        $wallet = AdminWallet::find($id);
        return view('admin.deposit.editMethod', compact('wallet'));
    }

    public function updateMethod(Request $request, $id)
    {
        // update the wallet and check if user uploaded a new image then remove old one and save new one
        $wallet = AdminWallet::find($id);
        $wallet->name = $request->name;
        $wallet->username = $request->username;
        $wallet->address = $request->address;
        if ($request->logo) {
            // remove old image
            unlink(public_path('images/logo/' . $wallet->logo));
            // save new image
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images/logo'), $imageName);
            $wallet->logo = $imageName;
        }
        $wallet->save();
        return redirect()->back()->with('success', 'Wallet updated successfully');
    }

    public function deleteMethod($id)
    {
        $wallet = AdminWallet::find($id);
        // remove image
        unlink(public_path('images/logo/' . $wallet->logo));
        $wallet->delete();
        return redirect()->back()->with('success', 'Wallet deleted successfully');
    }
}
