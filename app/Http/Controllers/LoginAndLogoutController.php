<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginAndLogoutController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Неверные данные входа');
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
