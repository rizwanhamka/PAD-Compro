<?php

use App\Models\Content;
use App\Models\Program;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TkArticleController;
use App\Http\Controllers\HomeYayasanController;
use App\Http\Controllers\YayasanStaffController;
use App\Http\Controllers\YayasanArticleController;
use App\Http\Controllers\YayasanProgramController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeYayasanController::class, 'index'])->name('YayasanArticle.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Static pages (global)
Route::get('/berita', fn() => view('admin.berita'))->name('berita');
Route::get('/article/id', fn() => view('articles.show')); // TODO: ubah jadi {id}
Route::get('/articles', fn() => view('articles.all'));
Route::get('/programs', fn() => view('program.all'));

/*
|--------------------------------------------------------------------------
| Admin Dashboard (Auth Protected)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard Home
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    // Manajemen Berita
    Route::get('/dashboard/berita', [ContentController::class, 'index'])->name('dashboard.berita');
    Route::post('/contents', [ContentController::class, 'store'])->name('contents.store');
    Route::put('/contents/{content}', [ContentController::class, 'update'])->name('contents.update');
    Route::delete('/contents/{content}', [ContentController::class, 'destroy'])->name('contents.destroy');

    // Manajemen Galeri
    Route::get('/dashboard/galeri', [GalleryController::class, 'dashboard'])->name('dashboard.galeri');
    Route::post('/dashboard/galeri', [GalleryController::class, 'store'])->name('dashboard.galeri.store');
    Route::delete('/dashboard/galeri/{gallery}', [GalleryController::class, 'destroy'])->name('dashboard.galeri.destroy');

    // Manajemen Program
    Route::get('/dashboard/program', [ProgramController::class, 'index'])->name('dashboard.program');
    Route::post('/programs', [ProgramController::class, 'store'])->name('programs.store');
    Route::put('/programs/{program}', [ProgramController::class, 'update'])->name('programs.update');
    Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');

    // Manajemen Staff
    Route::get('/dashboard/staff', [StaffController::class, 'index'])->name('dashboard.staff');
    Route::post('/staffs', [StaffController::class, 'store'])->name('staffs.store');
    Route::put('/staffs/{staff}', [StaffController::class, 'update'])->name('staffs.update');
    Route::delete('/staffs/{staff}', [StaffController::class, 'destroy'])->name('staffs.destroy');
});

/*
|--------------------------------------------------------------------------
| Yayasan Routes
|--------------------------------------------------------------------------
*/

Route::prefix('yayasan')->group(function () {

    // Artikel
    Route::get('articles', [YayasanArticleController::class, 'index'])->name('yayasan.articles.index');
    Route::get('article/{id}', function ($id) {
        $article = Content::findOrFail($id);
        $otherArticles = Content::where('id', '!=', $id)->latest()->take(3)->get();
        return view('sites.yayasan.articles.show', compact('article', 'otherArticles'));
    })->name('yayasan.articles.show');

    // Program
    Route::get('programs', [YayasanProgramController::class, 'index'])->name('yayasan.programs.index');
    Route::get('program/{id}', function ($id) {
        $program = Program::findOrFail($id);
        $otherPrograms = Program::where('id', '!=', $id)->latest()->take(3)->get();
        return view('sites.yayasan.program.show', compact('program', 'otherPrograms'));
    })->name('yayasan.articles.show');

    // Staff
    Route::get('staff', [YayasanStaffController::class, 'index'])->name('yayasan.staff.index');
});

// Galeri Yayasan (Frontend)
Route::get('yayasan/galeri', [GalleryController::class, 'index'])->name('yayasan.gallery');
Route::post('galeri', [GalleryController::class, 'store'])->name('gallery.store');

/*
|--------------------------------------------------------------------------
| TK Routes
|--------------------------------------------------------------------------
*/

Route::prefix('tk')->group(function () {

    // Artikel
    Route::get('articles', [TkArticleController::class, 'index'])->name('tk.articles.index');
    Route::get('article/{id}', function ($id) {
        $article = Content::findOrFail($id);
        $otherArticles = Content::where('id', '!=', $id)->latest()->take(3)->get();
        return view('sites.tk.articles.show', compact('article', 'otherArticles'));
    })->name('tk.articles.show');

    // Program
    Route::get('programs', fn() => view('sites.tk.program.all'))->name('tk.programs');

    // Galeri
    Route::get('galeri', fn() => view('sites.tk.gallery.index'))->name('tk.gallery');

    // Profil
    Route::get('profile', fn() => view('sites.tk.kepengurusan.profile'))->name('tk.profile');
});
