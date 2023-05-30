<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Donor;
use App\Models\Donation;
use App\Models\Activity;
use App\Models\User;
use DB;

class DonorController extends Controller
{
    public function dashboard()
    {
        $activity = Activity::all();
        return view('donor.dashboardDonor', ['activity' => $activity]);
    }

    public function sortByType(Request $request)
    {
        $activities = new Activity;
        $activities->type = $request->Type;

        $activity = Activity::where('type', '=', $activities->type)->get();
        return view('donor.dashboardDonor', ['activity' => $activity]);
    }

    public function profile()
    {
        $user = Auth::user(); // Mengambil objek User yang telah login
        $donor = Donor::where('username_donor', $user->username)->first();
        return view('donor.profileDonor', ['donor' => $donor]);
    }

    public function editProfile($id)
    {
        $donor = Donor::findOrFail($id);
        return view('donor.formDonorUpdate', ['donor' => $donor]);
    }

    public function updateProfile(Request $request, $id)
    {
        $donors = Donor::findOrFail($id);
        $users = User::findOrFail(Auth::id());
        
        $users->name = $request->NameDonor;
        $donors->name_donor = $request->NameDonor;
        $donors->email_donor = $request->EmailDonor;

        $users->save();
        $donors->save();
        return redirect()->route('donor.profile');
    }

    public function formDonate($id)
    {
        $id_activity = $id;
        return view('donor.formDonate', ['id_activity' => $id_activity]);
    }

    public function donate(Request $request)
    {
        $donations = new Donation;

        $donations->activity_id = $request->IdActivity;
        $donations->cash_nominal = $request->Cash;
        $donations->item_name = $request->NameItem;
        $donations->item_nominal = $request->NominalItem;
        $donations->item_quantity = $request->QuantityItem;
        $donations->total_donation = $donations->cash_nominal + ($donations->item_nominal * $donations->item_quantity);

        $donations->save();
        return redirect()->route('donor.dashboard');
    }
}