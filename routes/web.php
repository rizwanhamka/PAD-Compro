<?php

use App\Models\Content;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TkArticleController;
use App\Http\Controllers\HomeYayasanController;
use App\Http\Controllers\YayasanArticleController;

// Route untuk homepage
Route::get('/', [HomeYayasanController::class,'index'])->name('YayasanArticle.index');


// Routes Yayasan
Route::prefix('yayasan')->group(function () {

    // Semua artikel
    Route::get('articles', [YayasanArticleController::class, 'index'])
        ->name('yayasan.articles.index');

    // Detail artikel
    Route::get('article/{id}', function ($id) {
        $article = Content::findOrFail($id);
        $otherArticles = Content::where('id', '!=', $id)
                            ->latest()
                            ->take(3)
                            ->get();
        return view('sites.yayasan.articles.show', compact('article','otherArticles'));
    })->name('yayasan.articles.show');

    // Programs
    Route::get('programs', function () {
        return view('sites.yayasan.program.all');
    })->name('yayasan.programs');

    // Galeri
    Route::get('galeri', function () {
        return view('sites.yayasan.gallery.index');
    })->name('yayasan.gallery');

    // Profile kepengurusan
    Route::get('profile', function () {
        return view('sites.yayasan.kepengurusan.profile');
    })->name('yayasan.profile');
});

// Routes TK
Route::prefix('tk')->group(function () {

    // Semua artikel
    Route::get('articles', [TkArticleController::class,'index'])
        ->name('tk.articles.index');

    // Detail artikel
    Route::get('article/{id}', function ($id) {
        $article = Content::findOrFail($id);
        $otherArticles = Content::where('id', '!=', $id)
                            ->latest()
                            ->take(3)
                            ->get();
        return view('sites.tk.articles.show', compact('article','otherArticles'));
    })->name('tk.articles.show');

    // Programs
    Route::get('programs', function () {
        return view('sites.tk.program.all');
    })->name('tk.programs');

    // Galeri
    Route::get('galeri', function () {
        return view('sites.tk.gallery.index');
    })->name('tk.gallery');

    // Profile kepengurusan
    Route::get('profile', function () {
        return view('sites.tk.kepengurusan.profile');
    })->name('tk.profile');
});


// YANG INI HARUSNYA {ID}
Route::get('/article/id', function () {
    return view('articles.show');
});

Route::get('/articles', function () {
    return view('articles.all');
});

Route::get('/programs', function () {
    return view('program.all');
});
