<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class SmpGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('site_id', 4)
        ->latest()
        ->get();
        return view('sites.smp.gallery.index', compact('galleries'));
    }
}
