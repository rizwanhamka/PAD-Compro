<?php

namespace App\Http\Controllers;
use App\Models\Program;
use Illuminate\Http\Request;

class SdProgramController extends Controller
{
    public function index()
    {
        $program_all = Program::where('site_id', 3)
        ->latest()
        ->get();

        return view("sites.sd.program.all", compact("program_all"));

    }
}
