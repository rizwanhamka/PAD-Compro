<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class SmaStaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::where('site_id', 5)->get();
        return view('sites.sma.kepengurusan.staff', compact('staffs'));
    }
}
