<?php

namespace App\Http\Controllers;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\Content;

class SmpHomeController extends Controller
{
    public function index()
    {
        $berita_3 = Content::where('site_id', 4)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $program_3 = Program::where('site_id', 4)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view("sites.smp.home", compact("berita_3","program_3"));
    }
}
