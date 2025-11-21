<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class TkGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('site_id', 2)
        ->latest()
        ->get();
        return view('sites.tk.gallery.index', compact('galleries'));
    }
}
