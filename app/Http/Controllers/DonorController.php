<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Donor;
use DB;

class DonorController extends Controller
{
    public function dashboard()
    {
        return view('donor.dashboardDonor');
    }
}