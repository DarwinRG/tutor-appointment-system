<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TwilioService;

class OTPController extends Controller
{
  public function showVerifyForm()
  {
    return view('auth.verify-otp');
  }

  public function verify(Request $request)
  {
    $request->validate([
      'otp' => 'required|numeric',
      'phone_number' => ['required', 'string', 'regex:/^(09|\+639)\d{9}$/'],
    ]);

    if ($request->otp == session('otp') && $request->phone_number == session('phone_number')) {
      session()->forget(['otp', 'phone_number']);
      return redirect()->route('home');
    }

    return back()->withErrors(['otp' => 'Invalid OTP or phone number']);
  }

  public function send(Request $request)
  {
    $request->validate([
      'phone_number' => ['required', 'string', 'regex:/^(09|\+639)\d{9}$/'],
    ]);

    $otp = rand(100000, 999999);
    $twilioService = new TwilioService();
    $twilioService->sendOTP($request->phone_number, $otp);

    session(['otp' => $otp, 'phone_number' => $request->phone_number]);

    return response()->json(['message' => 'OTP sent successfully']);
  }
}