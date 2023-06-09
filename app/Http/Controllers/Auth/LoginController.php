<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\Donor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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

        $cekRole = User::where('username', $request->username)->first();
        $cekActivity = $request->ActivityID;

        if (!is_null($cekActivity)) {
            if(Auth::attempt($credentials)) {
                return redirect()->route('donor.formDonate', ['id' => $cekActivity]);
            } else {
                return redirect()->back();
            }
        } else {
            if($cekRole->role === 0) {
                if(Auth::attempt($credentials)) {
                    return redirect()->route('donor.dashboard');
                } else {
                    return redirect()->back();
                }
            } else if ($cekRole->role === 1) {
                if(Auth::attempt($credentials)) {
                    return redirect()->route('raiser.dashboard');
                } else {
                    return redirect()->back();
                }
            } else {
                if(Auth::attempt($credentials)) {
                    return redirect()->route('donor.list');
                } else {
                    return redirect()->back();
                }
            }
        }

        // if(Auth::attempt($credentials)){
        //     if($cekRole && $cekRole->role === 0) {
        //         return redirect()->route('donor.dashboard');
        //     } else if($cekRole && $cekRole->role === 1) {
        //         return redirect()->route('raiser.dashboard');
        //     } else {
        //         return redirect()->route('donor.list');
        //     }
        // } else {
        //     return redirect()->back();
        // }
    }
}
