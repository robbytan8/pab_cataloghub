<?php

namespace App\Http\Controllers\AuthManual;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/**
 * @author Robby Tan
 */
class ForgotPasswordController extends Controller
{
  public function showForgotPasswordForm()
  {
    return view('auth_mn.password-request');
  }

  public function sendResetLink(Request $request)
  {
    $request->validate([
      'email' => 'required|email'
    ]);

    $user = User::where('email', $request->email)->first();
    if ($user) {
      Password::sendResetLink($request->only('email'));
    }
    return redirect()->route('password.notice')->with('status', 'Please check your email for the reset password link.');
  }
}
