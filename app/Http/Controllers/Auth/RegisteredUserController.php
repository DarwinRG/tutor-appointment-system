<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\TwilioService;
use App\Helpers\OTPHelper;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => ['required', 'string', 'regex:/^(09|\+639)\d{9}$/'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'user_type' => 'r', // Default to Regular User
        ]);

        event(new Registered($user));
        Auth::login($user);

        $otp = OTPHelper::generateOTP();
        $twilioService = new TwilioService();
        $twilioService->sendOTP($request->phone_number, $otp);

        // Store OTP and phone number in session for verification
        session(['otp' => $otp, 'phone_number' => $request->phone_number]);

        return redirect()->route("view_page");
    }
}