<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;

class SmpHomeController extends Controller
{
    public function index()
    {
        $profile = CompanyProfile::where('site_id', 4)->first();
        $berita_3 = Content::where('site_id', 4)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $program_3 = Program::where('site_id', 4)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view("sites.smp.home", compact("berita_3","program_3", "profile"));
    }
}
