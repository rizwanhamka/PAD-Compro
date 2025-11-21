<?php

use App\Models\Content;
use App\Models\Program;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SdHomeController;
use App\Http\Controllers\TkHomeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SdStaffController;
use App\Http\Controllers\SmaHomeController;
use App\Http\Controllers\SmpHomeController;
use App\Http\Controllers\TkStaffController;
use App\Http\Controllers\SmaStaffController;
use App\Http\Controllers\SmpStaffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SdArticleController;
use App\Http\Controllers\SdGalleryController;
use App\Http\Controllers\SdProgramController;
use App\Http\Controllers\TkArticleController;
use App\Http\Controllers\TkGalleryController;
use App\Http\Controllers\TkProgramController;
use App\Http\Controllers\SmaArticleController;
use App\Http\Controllers\SmaGalleryController;
use App\Http\Controllers\SmaProgramController;
use App\Http\Controllers\SmpArticleController;
use App\Http\Controllers\SmpGalleryController;
use App\Http\Controllers\SmpProgramController;
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

/*
|--------------------------------------------------------------------------
| TK Routes
|--------------------------------------------------------------------------
*/

Route::prefix('tk')->group(function () {

    // Home
    Route::get('/', [TkHomeController::class, 'index'])->name('tk.home');

    // Artikel
    Route::get('articles', [TkArticleController::class, 'index'])->name('tk.articles.index');
    Route::get('article/{id}', function ($id) {
        $article = Content::findOrFail($id);
        $otherArticles = Content::where('id', '!=', $id)->latest()->take(3)->get();
        return view('sites.tk.articles.show', compact('article', 'otherArticles'));
    })->name('tk.articles.show');

    // Program
    Route::get('programs', [TkProgramController::class, 'index'])->name('tk.programs.index');
    Route::get('program/{id}', function ($id) {
    $program = Program::where('site_id', 2)->findOrFail($id);

    $otherPrograms = Program::where('site_id', 2)
        ->where('id', '!=', $id)
        ->latest()
        ->take(3)
        ->get();

        return view('sites.tk.program.show', compact('program', 'otherPrograms'));
    })->name('tk.programs.show');

    // Staff
    Route::get('staff', [TkStaffController::class, 'index'])->name('tk.staff.index');

    // Galeri
    Route::get('galeri', [TkGalleryController::class, 'index'])->name('tk.gallery.index');
});

Route::prefix('sd')->group(function () {

    // Home
    Route::get('/', [SdHomeController::class, 'index'])->name('sd.home');

    // Artikel
    Route::get('articles', [SdArticleController::class, 'index'])->name('sd.articles.index');
    Route::get('article/{id}', function ($id) {
        $article = Content::findOrFail($id);
        $otherArticles = Content::where('id', '!=', $id)->latest()->take(3)->get();
        return view('sites.sd.articles.show', compact('article', 'otherArticles'));
    })->name('sd.articles.show');

    // Program
    Route::get('programs', [SdProgramController::class, 'index'])->name('sd.programs.index');
    Route::get('program/{id}', function ($id) {
        $program = Program::findOrFail($id);
        $otherPrograms = Program::where('id', '!=', $id)->latest()->take(3)->get();
        return view('sites.sd.program.show', compact('program', 'otherPrograms'));
    })->name('sd.programs.show');

    // Staff
    Route::get('staff', [SdStaffController::class, 'index'])->name('sd.staff.index');

    // Galeri
    Route::get('galeri', [SdGalleryController::class, 'index'])->name('sd.gallery.index');
});



Route::prefix('smp')->group(function () {

    // Home
    Route::get('/', [SmpHomeController::class, 'index'])->name('smp.home');

    // Artikel
    Route::get('articles', [SmpArticleController::class, 'index'])->name('smp.articles.index');
    Route::get('article/{id}', function ($id) {
        $article = Content::findOrFail($id);
        $otherArticles = Content::where('id', '!=', $id)->latest()->take(3)->get();
        return view('sites.smp.articles.show', compact('article', 'otherArticles'));
    })->name('smp.articles.show');

    // Program
    Route::get('programs', [SmpProgramController::class, 'index'])->name('smp.programs.index');
    Route::get('program/{id}', function ($id) {
        $program = Program::findOrFail($id);
        $otherPrograms = Program::where('id', '!=', $id)->latest()->take(3)->get();
        return view('sites.smp.program.show', compact('program', 'otherPrograms'));
    })->name('smp.programs.show');

    // Staff
    Route::get('staff', [SmpStaffController::class, 'index'])->name('smp.staff.index');

    // Galeri
    Route::get('galeri', [SmpGalleryController::class, 'index'])->name('smp.gallery.index');
});

Route::prefix('sma')->group(function () {

    // Home
    Route::get('/', [SmaHomeController::class, 'index'])->name('sma.home');

    // Artikel
    Route::get('articles', [SmaArticleController::class, 'index'])->name('sma.articles.index');
    Route::get('article/{id}', function ($id) {
        $article = Content::findOrFail($id);
        $otherArticles = Content::where('id', '!=', $id)->latest()->take(3)->get();
        return view('sites.sma.articles.show', compact('article', 'otherArticles'));
    })->name('sma.articles.show');

    // Program
    Route::get('programs', [SmaProgramController::class, 'index'])->name('sma.programs.index');
    Route::get('program/{id}', function ($id) {
        $program = Program::findOrFail($id);
        $otherPrograms = Program::where('id', '!=', $id)->latest()->take(3)->get();
        return view('sites.sma.program.show', compact('program', 'otherPrograms'));
    })->name('sma.programs.show');

    // Staff
    Route::get('staff', [SmaStaffController::class, 'index'])->name('sma.staff.index');

    // Galeri
    Route::get('galeri', [SmaGalleryController::class, 'index'])->name('sma.gallery.index');
});
