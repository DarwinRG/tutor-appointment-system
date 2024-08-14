<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Services\TwilioService;
use App\Helpers\OTPHelper;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => ['required', 'string', 'regex:/^(09|\+639)\d{9}$/'],
            'otp' => 'required|numeric',
            'password' => 'required|string',
        ]);

        if ($request->otp != session('otp') || $request->phone_number != session('phone_number')) {
            return back()->withErrors(['otp' => 'Invalid OTP or phone number']);
        }

        session()->forget(['otp', 'phone_number']);

        if (Auth::attempt($request->only('phone_number', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'phone_number' => 'The provided credentials do not match our records.',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}