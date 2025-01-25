<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'referral' => ['required', 'string', 'max:255'],
            'pin' => ['required', 'string', 'min:6', 'max:6'],
            'phone' => ['required', 'string', 'max:255'],
            'terms' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // check if any user have this referral code or not
        $refer_check = User::where('referral_id', $request->referral)->first();
        if ($refer_check == null) {
            return redirect()->back()->with('error', 'Use original refer code');
        }

        // generate referral code

        $referral_code = 'US' . rand(10000, 99999);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'pin' => $request->pin,
            'referral_id' => $referral_code,
            'referral' => $request->referral,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('User.Dashboard', absolute: false))->with('success', 'Welcome to USVenturs');
    }
}
