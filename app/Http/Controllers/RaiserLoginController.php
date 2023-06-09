<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class RaiserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('raiser.loginRaiser');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required'=>'Username required',
            'password.required'=>'Password required'
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('raiser.dashboard');
        } else {
            return redirect()->back();
        }
    }

    function logout() {
        Auth::logout();
        return redirect()->route('landing');
    }
}
