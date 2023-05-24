<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Raiser;
use App\Models\User;

class RaiserRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('raiser.registerRaiser');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'UsernameRaiser' => 'required|unique:raisers,username_pic',
            'PasswordRaiser' => 'required',
            'NameRaiser' => 'required',
            'noTelp' => 'required'
        ]);

        $raisers = new Raiser;
        $users = new User;
        
        $raisers->username_pic = $request->UsernameRaiser;
        $raisers->password_pic = $request->PasswordRaiser;
        $raisers->name_pic = $request->NameRaiser;
        $raisers->no_telp = $request->noTelp;

        if ($request->has('Personal')) {
            $raisers->nama_instansi = "-";
            $raisers->profil = "Pribadi";
        } else {
            $raisers->nama_instansi = $request->AgencyRaiser;
            $raisers->profil = $request->Department;
        }

        $raisers->save();

        $users->username = $request->UsernameRaiser;
        $users->password = Hash::make($request->PasswordRaiser);
        $users->name = $request->NameRaiser;
        $users->role = 1;
        $users->save();

        $credentials = [
            'username' => $request->UsernameRaiser,
            'password' => $request->PasswordRaiser,
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('donor.dasboard');
        } else {
            return redirect()->back();
        }
    }
}
