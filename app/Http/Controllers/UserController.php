<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // ============================================================

    // make user
    public function store (Request $request) {
        date_default_timezone_set('Etc/GMT-4');

        // get form data, validate
        $data = $request->validate([
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        // hash pw
        $data['password'] = bcrypt($data['password']);

        // push to db
        $user = User::create($data);

        // log 'em in
        Auth::login($user);

        // redirect
        return redirect('/posts')->with('success', 'Signup successful!');
    }

    // ============================================================

    // log out
    public function logout () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out!');
    }

    // ============================================================

    // log in
    public function login (Request $request) {
        // get form data, validate
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // if login successful
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/posts')->with('success', 'Logged in!');
        }

        // if login unsuccessful
        return back()->withErrors([
            'failed-login' => 'The provided credentials do not match our records.'
        ]);
    }

    // ============================================================
}
