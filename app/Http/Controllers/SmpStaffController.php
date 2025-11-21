<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class SmpStaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::where('site_id', 4)->get();
        return view('sites.smp.kepengurusan.staff', compact('staffs'));
    }
}
