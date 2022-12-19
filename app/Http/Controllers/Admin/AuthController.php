<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login() {
        return view('admin.login.login');
    }

    public function checkLogin(Request $request) {
        // dd($request->name);
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successfully');
        }
        return redirect()->route('admin.auth.login')->with('error','Login failed');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('admin.auth.login');
    }
}
