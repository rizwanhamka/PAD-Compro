<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;

class SmaArticleController extends Controller
{
    public function index()
    {
        $berita_all = Content::where('site_id', '=',5)->latest()->get();
        return view("sites.sma.articles.all", compact("berita_all"));
    }
}
