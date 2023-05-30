<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Donor;
use App\Models\Raiser;
use App\Models\User;
use DB;

class AdminController extends Controller
{

    //admin donor
    public function showDaftarDonor(Request $request)
    {
        $donorQuery = Donor::query();
        $donor = $donorQuery->paginate(5);
        $donor->appends($request->query());
        return view('admin.dashboardAdmin', ['donor' => $donor]);
    }

    public function showFormDonorAdd()
    {
        return view('admin.formDonorAdd');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'UsernameDonor' => 'required|unique:donors,username_donor',
            'PasswordDonor' => 'required',
            'NameDonor' => 'required',
            'EmailDonor' => 'required|unique:donors,email_donor'
        ]);

        $donors = new Donor;
        $users = new User;
        
        $donors->username_donor = $request->UsernameDonor;
        $donors->password_donor = $request->PasswordDonor;
        $donors->name_donor = $request->NameDonor;
        $donors->email_donor = $request->EmailDonor;

        $users->username = $request->UsernameDonor;
        $users->password = Hash::make($request->PasswordDonor);
        $users->name = $request->NameDonor;

        $users->save();
        $donors->save();
        $donor = Donor::all();
        return redirect()->route('donor.list', ['donor' => $donor]);
    }

    public function edit(Donor $donor, $id)
    {
        $donor = Donor::findOrFail($id);
        return view('admin.formDonorUpdate', ['donor' => $donor]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'UsernameDonor' => 'required'
        ]);

        $donors = Donor::findOrFail($id);
        
        $donors->username_donor = $request->UsernameDonor;

        $donors->save();
        $donor = Donor::all();
        return redirect()->route('donor.list', ['donor' => $donor]);
    }

    public function delete($id)
    {
        $donors = Donor::findOrFail($id);
        $users = User::where('username', '=', $donors->username_donor)->first();
        $donors->delete();
        $users->delete();
        $donor = Donor::all();
        return redirect()->route('donor.list', ['donor' => $donor]);
    }

    //admin raiser
    public function showDaftarRaiser(Request $request)
    {
        $raiserQuery = Raiser::query();
        $raiser = $raiserQuery->paginate(5);
        $raiser->appends($request->query());
        return view('admin.dashboardAdmin2', ['raiser' => $raiser]);
    }

    public function showFormRaiserAdd()
    {
        return view('admin.formRaiserAdd');
    }

    public function storeRaiser(Request $request)
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

        $users->username = $request->UsernameRaiser;
        $users->password = Hash::make($request->PasswordRaiser);
        $users->name = $request->NameRaiser;
        $users->role = 1;

        $users->save();

        if ($request->has('Personal')) {
            $raisers->nama_instansi = "-";
            $raisers->profil = "Pribadi";
        } else {
            $raisers->nama_instansi = $request->AgencyRaiser;
            $raisers->profil = $request->Department;
        }

        $raisers->save();
        $raiser = Raiser::all();
        return redirect()->route('raiser.listRaiser', ['raiser' => $raiser]);
    }

    public function editRaiser(Raiser $raiser, $id)
    {
        $raiser = Raiser::findOrFail($id);
        return view('admin.formRaiserUpdate', ['raiser' => $raiser]);
    }

    public function updateRaiser(Request $request, $id)
    {
        $this->validate($request, [
            'UsernameRaiser' => 'required'
        ]);

        $raisers = Raiser::findOrFail($id);
        
        $raisers->username_pic = $request->UsernameRaiser;

        $raisers->save();
        $raiser = Raiser::all();
        return redirect()->route('raiser.listRaiser', ['raiser' => $raiser]);
    }

    public function deleteRaiser($id)
    {
        $raisers = Raiser::findOrFail($id);
        $users = User::where('username', '=', $raisers->username_pic)->first();
        $raisers->delete();
        $users->delete();
        $raiser = Raiser::all();
        return redirect()->route('raiser.listRaiser', ['raiser' => $raiser]);
    }

}