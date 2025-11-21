<?php

namespace App\Http\Controllers;
use App\Models\Program;
use Illuminate\Http\Request;

class SmaProgramController extends Controller
{
    public function index()
    {
        $program_all = Program::where('site_id', 5)
        ->latest()
        ->get();

        return view("sites.sma.program.all", compact("program_all"));

    }
}
