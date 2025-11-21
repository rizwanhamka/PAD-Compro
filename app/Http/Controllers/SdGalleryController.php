<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class SdGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('site_id', 3)
        ->latest()
        ->get();
        return view('sites.sd.gallery.index', compact('galleries'));
    }
}
