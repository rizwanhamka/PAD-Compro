<?php

use App\Http\Controllers\HomeYayasanController;
use App\Http\Controllers\YayasanArticleController;
use App\Models\Content;
use Illuminate\Support\Facades\Route;

// Route untuk homepage
Route::get('/', [HomeYayasanController::class,'index'])->name('YayasanArticle.index');


Route::prefix('yayasan')->group(function () {

    // Route articles
    Route::get('article/{id}', function ($id) {
    $article = Content::findOrFail($id);
    return view('sites.yayasan.articles.show', compact('article'));
});

    Route::get('articles',[YayasanArticleController::class,'index'])->name('YayasanArticle.index');

    // Route programs
    Route::get('programs', function () {
        return view('sites.yayasan.program.all');
    });

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
