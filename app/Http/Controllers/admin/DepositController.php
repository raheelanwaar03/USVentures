<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\AdminWallet;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function addDeposit()
    {
        return view('admin.deposit.addMethod');
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

}
