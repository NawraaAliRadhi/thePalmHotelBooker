<?php

namespace App\Http\Controllers\Client\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view("client.auth.register");
    }

    public function login()
    {
        return view("client.auth.login");
    }

    public function processLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|exists:users,email|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), true)) {
            return redirect('/');
        } else {
            return view('client.auth.login')->with('invalid', 'your email or password is incorrect.');
        }
    }

    public function processRegister(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed',
            'name' => 'required|min:3'
        ]);

        $user = new User;
        $user->role_as = 2;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/auth/login')->with('success', "Your account was registered successfully, you can now login.");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
