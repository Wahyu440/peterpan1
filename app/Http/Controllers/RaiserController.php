<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Donor;
use App\Models\Donation;
use App\Models\Raiser;
use App\Models\Activity;
use App\Models\User;
use DB;

class RaiserController extends Controller
{
    public function dashboard()
    {
        $activities = new Activity;
        $user = Auth::user(); // Mengambil objek User yang telah login
        $raiser = Raiser::where('username_pic', $user->username)->first();
        $activities->admin_id = $raiser->id;

        $activity = Activity::where('admin_id', '=', $activities->admin_id)->get();
        return view('raiser.dashboardRaiser', ['activity' => $activity]);
    }

    public function showFormActivityAdd()
    {
        return view('raiser.formActivityAdd');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'NameProgram' => 'required|unique:activities,name',
            'Target' => 'required',
            'Type' => 'required',
            'Address' => 'required',
            'startDate' => 'required',
            'endDate' => 'required'
        ]);

        $activities = new Activity;
        $user = Auth::user(); // Mengambil objek User yang telah login
        $raiser = Raiser::where('username_pic', $user->username)->first();

        $activities->admin_id = $raiser->id;
        $activities->name = $request->NameProgram;
        $activities->target = $request->Target;
        $activities->type = $request->Type;
        $activities->address = $request->Address;
        $activities->start = $request->startDate;
        $activities->end = $request->endDate;

        $activities->save();
        
        return redirect()->route('raiser.dashboard');
    }

    public function profile()
    {
        $user = Auth::user(); // Mengambil objek User yang telah login
        $raiser = Raiser::where('username_pic', $user->username)->first();
        return view('raiser.profileRaiser', ['raiser' => $raiser]);
    }

    public function detail($id)
    {
        $activity = Activity::findOrFail($id);
        return view('raiser.detailActivity', ['activity' => $activity]);
    }

    public function detailActivityDonation($id)
    {
        $activity = Activity::findOrFail($id);
        return view('raiser.detailDonation', ['activity' => $activity]);
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('raiser.formActivityUpdate', ['activity' => $activity]);
    }

    public function update(Request $request, $id)
    {
        $activities = Activity::findOrFail($id);
        
        $activities->name = $request->NameProgram;
        $activities->target = $request->Target;
        $activities->type = $request->Type;
        $activities->address = $request->Address;
        $activities->start = $request->startDate;
        $activities->end = $request->endDate;

        $activities->save();
        return redirect('/raiser/activity/detail/'.$id);
    }

    public function delete($id)
    {
        $activities = Activity::findOrFail($id);
        $activities->delete();
        return redirect()->route('raiser.dashboard');
    }

    public function editProfile($id)
    {
        $raiser = Raiser::findOrFail($id);
        return view('raiser.formRaiserUpdate', ['raiser' => $raiser]);
    }

    public function updateProfile(Request $request, $id)
    {
        $raisers = Raiser::findOrFail($id);
        $users = User::findOrFail(Auth::id());
        
        $users->name = $request->NameRaiser;
        $raisers->name_pic = $request->NameRaiser;
        $raisers->no_telp = $request->NoTelp;
        $raisers->nama_instansi = $request->AgencyRaiser;
        $raisers->profil = $request->Department;

        $users->save();
        $raisers->save();
        return redirect()->route('raiser.profile');
    }

    public function list($id)
    {
        $payment = Donation::where('activity_id', $id)->whereNotNull('payment')->paginate(5);
        return view('raiser.detailDonation', ['payment' => $payment]);
    }
}