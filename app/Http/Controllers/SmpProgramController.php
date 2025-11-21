<?php

namespace App\Http\Controllers;
use App\Models\Program;
use Illuminate\Http\Request;

class SmpProgramController extends Controller
{
    public function index()
    {
        $program_all = Program::where('site_id', 4)
        ->latest()
        ->get();

        return view("sites.smp.program.all", compact("program_all"));

    }
}
