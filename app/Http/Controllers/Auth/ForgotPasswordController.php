<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    // Show form to request reset link
    public function showLinkRequestForm()
    {
        return view('auth.forgotPassword');
    }

    // Send reset link (or PIN) to user email
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        // Create token
        $token = Str::random(60);

        // Save token in password_resets table
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => now()
            ]
        );

        // Send email
        Mail::raw("Reset your password here: ".url('/reset-password/'.$token), function ($message) use ($request) {
            $message->to($request->email)->subject('Reset Password Link');
        });

        return back()->with('status', 'We have emailed your password reset link!');
    }

    // Show reset form
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // Handle password reset
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required'
        ]);

        $record = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$record) {
            return back()->withErrors(['email' => 'Invalid token or email']);
        }

        // Update user password
        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        // Delete token
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect('/login')->with('status', 'Your password has been reset!');
    }
}
