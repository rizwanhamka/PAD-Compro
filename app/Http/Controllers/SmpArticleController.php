<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;

class SmpArticleController extends Controller
{
    public function index()
    {
        $berita_all = Content::where('site_id', '=',4)->latest()->get();
        return view("sites.smp.articles.all", compact("berita_all"));
    }
}
