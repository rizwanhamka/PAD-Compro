<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;

class SdHomeController extends Controller
{
    public function index()
    {
        $profile = CompanyProfile::where('site_id', 3)->first();
        $berita_3 = Content::where('site_id', 3)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $program_3 = Program::where('site_id', 3)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view("sites.sd.home", compact("berita_3","program_3", "profile"));
    }
}
