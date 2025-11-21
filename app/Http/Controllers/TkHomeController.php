<?php

namespace App\Http\Controllers;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\Content;

class TkHomeController extends Controller
{
    public function index()
    {
        $berita_3 = Content::where('site_id', 2)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $program_3 = Program::where('site_id', 2)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view("sites.tk.home", compact("berita_3","program_3"));
    }
}
