<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Program;
class SmaHomeController extends Controller
{
    public function index()
    {
        $berita_3 = Content::where('site_id', 5)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $program_3 = Program::where('site_id', 5)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view("sites.sma.home", compact("berita_3","program_3"));
    }
}
