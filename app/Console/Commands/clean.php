<?php

namespace App\Console\Commands;

use App\Models\admin\AdminWallet;
use App\Models\admin\TelegramLink;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean the database and seed the default data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        $user = new User();
        $user->name = 'Admin';
        $user->referral = 'default';
        $user->balance = 0.00;
        $user->phone = '03167007156';
        $user->password = Hash::make('asdfasdf');
        $user->status = 'active';
        $user->role = 'admin';
        $user->referral_id = 'US123457';
        $user->level = 'vip1';
        $user->pin = '123457';
        $user->save();

        $user = new User();
        $user->name = 'User';
        $user->referral = 'default';
        $user->balance = 25;
        $user->phone = '03149720318';
        $user->password = Hash::make('asdfasdf');
        $user->status = 'active';
        $user->role = 'user';
        $user->referral_id = 'US123456';
        $user->level = 'vip1';
        $user->pin = '111111';
        $user->save();

        // add telegram link
        $telegram = new TelegramLink();
        $telegram->link = 'https://t.me/USVentures1';
        $telegram->save();

        $adminWallet = new AdminWallet();
        $adminWallet->name = 'Binance';
        $adminWallet->type = 'Trc20 & Bep20';
        $adminWallet->address = 'adfadfadfadfadfasdf';
        $adminWallet->status = 'active';
        $adminWallet->save();
    }
}
