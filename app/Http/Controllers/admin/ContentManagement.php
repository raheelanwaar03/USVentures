<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\TelegramLink;
use Illuminate\Http\Request;

class ContentManagement extends Controller
{
    public function addTelegramLink()
    {
        $link = TelegramLink::first();
        return view('admin.content.telegramLink', compact('link'));
    }

    public function storeTelegramLink(Request $request)
    {
        // delete old links and create new one
        $oldlinks = TelegramLink::all();
        foreach ($oldlinks as $link) {
            $link->delete();
        }

        $telegramLink =  new TelegramLink();
        $telegramLink->link = $request->link;
        $telegramLink->save();
        return redirect()->back()->with('success', 'Telegram Link Added Successfully');
    }
}
