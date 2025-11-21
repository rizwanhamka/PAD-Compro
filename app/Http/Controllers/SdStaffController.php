<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class SdStaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::where('site_id', 3)->get();
        return view('sites.sd.kepengurusan.staff', compact('staffs'));
    }
}
