<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Donor;
use App\Models\Raiser;
use App\Models\Donation;
use App\Models\Activity;
use App\Models\User;
use DB;
use Carbon\Carbon;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LandingController extends Controller
{
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

    public function home()
    {
        $activity = Activity::whereDate('end', '>=', Carbon::today())->orderBy('start', 'desc')->get();
        return view('landing',['activity' => $activity]);
    }

    public function showLoginForm($id)
    {
        $activityId = $id;
        return view('loginQuick',['activityId' => $activityId]);
    }

    public function showRegisterForm($id)
    {
        $activityId = $id;
        return view('registerQuick',['activityId' => $activityId]);
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

        $cekActivity = $request->ActivityID;
        if(Auth::attempt($credentials)){
            return redirect()->route('donor.formDonate', ['id' => $cekActivity]);
        } else {
            return redirect()->back();
        }
    }
}
