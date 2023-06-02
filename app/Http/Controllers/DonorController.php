<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Donor;
use App\Models\Raiser;
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

    public function detail($id)
    {
        $activity = Activity::findOrFail($id);
        $raiser = Raiser::find($activity->admin_id);
        $nama_instansi = $raiser->nama_instansi;
        $nama_pic = $raiser->name_pic;
        $noTelp = $raiser->no_telp;
        return view('donor.detailActivityDonor', ['activity' => $activity, 'nama_instansi' => $nama_instansi, 'nama_pic' => $nama_pic, 'noTelp' => $noTelp]);
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
        $user = Auth::user(); // Mengambil objek User yang telah login
        $donations = new Donation;

        $donations->donor_username = $user->username;
        $donations->activity_id = $request->IdActivity;
        $donations->cash_nominal = $request->Cash;
        $donations->item_name = $request->NameItem;
        $donations->item_nominal = $request->NominalItem;
        $donations->item_quantity = $request->QuantityItem;
        $donations->total_donation = $donations->cash_nominal + ($donations->item_nominal * $donations->item_quantity);

        $donations->save();
        return redirect()->route('donor.dashboard');
    }

    public function list()
    {
        $user = Auth::user(); // Mengambil objek User yang telah login
        $donation = Donation::where('donor_username', $user->username)->whereNull('payment')->paginate(3);
        $payment = Donation::where('donor_username', $user->username)->whereNotNull('payment')->paginate(3);
        return view('donor.donationDonor', ['donation' => $donation, 'payment' => $payment]);
    }

    public function delete($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();
        return redirect()->route('donation.list');
    }

    public function uploadPayment($id)
    {
        $donation = Donation::findOrFail($id);
        return view('donor.formUploadPayment', ['donation' => $donation]);
    }

    public function payment(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);
        $payment = $request->input('Payment');
        
        $activity = Activity::findOrFail($donation->activity_id);
        $raiser = Raiser::find($activity->admin_id);
        $noTelp = $raiser->no_telp;

        // Check if the payment value starts with "pay" and has a length of 28 characters
        if (strpos($payment, 'PAY'.$noTelp) === 0 && strlen($payment) === 28) {
            $donation->payment = $payment;
            $donation->save();

            $activity = Activity::findOrFail($donation->activity_id);
            $activity->total_donor += 1;
            $activity->realization += $donation->total_donation;
            $activity->save();

            return redirect()->route('donation.list');
        } else {
            // Invalid payment value
            $errorMessage = 'Invalid Transaction ID';
            return back()->withErrors($errorMessage);
        }
    }
}