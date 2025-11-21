<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
class TkProgramController extends Controller
{
    public function index()
    {
        $program_all = Program::where('site_id', 2)
        ->latest()
        ->get();

        return view("sites.tk.program.all", compact("program_all"));

    }
}
