<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Controller
{
    //

    public function index()
    {
        $data = [
            'content' => 'auth.login'
        ];
        return view('auth.login', $data);
    }

    public function doLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('/admin/isikonten');
        }

        return back()->with('loginError', 'Failed Login, Email dan Password tidak ditemukan');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}