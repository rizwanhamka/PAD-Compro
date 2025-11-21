<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;

class SmaHomeController extends Controller
{
    public function index()
    {
    $berita_3 = Content::where('site_id', 5)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

    return view('sites.sma.home', compact('berita_3'));

    }
}
