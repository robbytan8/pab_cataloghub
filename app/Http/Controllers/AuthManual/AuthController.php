<?php

namespace App\Http\Controllers\AuthManual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @author Robby Tan
 */
class AuthController extends Controller
{
  public function login()
  {
    return view('auth_mn.login');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if (auth()->attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended(route('home'));
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }

  public function logout(Request $request)
  {
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
  }
}
