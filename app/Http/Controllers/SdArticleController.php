<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;

class SdArticleController extends Controller
{
    public function index()
    {
        $berita_all = Content::where('site_id', '=',3)->latest()->get();
        return view("sites.sd.articles.all", compact("berita_all"));
    }
}
