<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Sessions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Donor;
use App\Models\User;
use DB;

class DonorLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {

    }

    public function showLoginForm()
    {
        return view('donor.loginDonor');
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
            return redirect()->route('donor.dasboard');
        } else {
            return redirect()->back();
        }
    }

    function logout() {
        Auth::logout();
        return redirect()->route('landingPage');
    }
}