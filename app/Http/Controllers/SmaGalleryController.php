<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class SmaGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('site_id', 5)
        ->latest()
        ->get();
        return view('sites.sma.gallery.index', compact('galleries'));
    }
}
