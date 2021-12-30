<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the application's admin login.
     */
    public function login()
    {
        return view('admin.login');
    }

    /**
     * Process the login.
     */
    public function processLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), true)) {
            return redirect('/admin/dashboard');
        } else {
            return view('admin.login')->with('invalid', 'your email or password is incorrect.');
        }
    }

    /**
     * Log users out
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
