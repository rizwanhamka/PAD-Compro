<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Http\Request;

class TkStaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::where('site_id', 2)->get();
        return view('sites.tk.kepengurusan.staff', compact('staffs'));
    }
}
