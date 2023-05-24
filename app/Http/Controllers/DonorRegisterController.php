<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Donor;
use App\Models\User;
use DB;

class DonorRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('donor.registerDonor');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'UsernameDonor' => 'required',
            'PasswordDonor' => 'required',
            'NameDonor' => 'required',
            'EmailDonor' => 'required'
        ]);

        $donors = new Donor;
        $users = new User;
        
        $donors->username_donor = $request->UsernameDonor;
        $donors->password_donor = $request->PasswordDonor;
        $donors->name_donor = $request->NameDonor;
        $donors->email_donor = $request->EmailDonor;
        $donors->save();

        $users->username = $request->UsernameDonor;
        $users->password = Hash::make($request->PasswordDonor);
        $users->name = $request->NameDonor;
        $users->save();

        $credentials = [
            'username' => $request->UsernameDonor,
            'password' => $request->PasswordDonor,
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('donor.dasboard');
        } else {
            return redirect()->back();
        }
    }
}
