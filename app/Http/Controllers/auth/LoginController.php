<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user(); // Get the authenticated user

        // Redirect based on role
        if ($user->role === 'caregiver') {
            return redirect()->route('caregiver.dashboard');
        } elseif ($user->role === 'patient') {
            return redirect()->route('patient.dashboard');
        } elseif ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            // Fallback if role is not matched
            Auth::logout();
            return redirect()->route('auth.login')->with('error', 'Unauthorized role.');
        }
    }

    // If authentication fails
    return redirect()->back()->with('error', 'Invalid credentials.');
}
}
