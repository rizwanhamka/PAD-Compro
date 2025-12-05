<?php

use App\Models\Staff;
use App\Models\Content;
use App\Models\Program;
use App\Models\CompanyProfile;
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
use App\Http\Controllers\CompanyProfileController;
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

// Route::middleware('auth')->group(function () {

//     // Dashboard Home
//     Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

//     // Manajemen Berita
//     Route::get('/dashboard/berita', [ContentController::class, 'index'])->name('dashboard.berita');
//     Route::post('/contents', [ContentController::class, 'store'])->name('contents.store');
//     Route::put('/contents/{content}', [ContentController::class, 'update'])->name('contents.update');
//     Route::delete('/contents/{content}', [ContentController::class, 'destroy'])->name('contents.destroy');

//     // Manajemen Galeri
//     Route::get('/dashboard/galeri', [GalleryController::class, 'dashboard'])->name('dashboard.galeri');
//     Route::post('/dashboard/galeri', [GalleryController::class, 'store'])->name('dashboard.galeri.store');
//     Route::delete('/dashboard/galeri/{gallery}', [GalleryController::class, 'destroy'])->name('dashboard.galeri.destroy');

//     // Manajemen Program
//     Route::get('/dashboard/program', [ProgramController::class, 'index'])->name('dashboard.program');
//     Route::post('/programs', [ProgramController::class, 'store'])->name('programs.store');
//     Route::put('/programs/{program}', [ProgramController::class, 'update'])->name('programs.update');
//     Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');

//     // Manajemen Staff
//     Route::get('/dashboard/staff', [StaffController::class, 'index'])->name('dashboard.staff');
//     Route::post('/staffs', [StaffController::class, 'store'])->name('staffs.store');
//     Route::put('/staffs/{staff}', [StaffController::class, 'update'])->name('staffs.update');
//     Route::delete('/staffs/{staff}', [StaffController::class, 'destroy'])->name('staffs.destroy');
// });

/*
|--------------------------------------------------------------------------
| Yayasan Routes
|--------------------------------------------------------------------------
*/


function buildSiteRoutes($prefix, $controllers, $viewsBase, $siteIdMap = null) {
    // default mapping site_id kalau diperlukan (optional)
    $defaultSiteIdMap = [
        'yayasan' => 1,
        'tk'      => 2,
        'sd'      => 3,
        'smp'     => 4,
        'sma'     => 5,
    ];
    $siteIdMap = $siteIdMap ?? $defaultSiteIdMap;

    Route::prefix($prefix)->group(function () use ($controllers, $viewsBase, $prefix, $siteIdMap) {

        // Home (controller)
        Route::get('/', [$controllers['home'], 'index'])->name($prefix . '.home');

        // Articles index (controller)
        Route::get('articles', [$controllers['article'], 'index'])->name($prefix . '.articles.index');

        // Article show (closure uses $viewsBase)
        Route::get('article/{id}', function ($id) use ($viewsBase) {
            $article = Content::findOrFail($id);
            $otherArticles = Content::where('id', '!=', $id)->latest()->take(3)->get();
            return view($viewsBase . '.articles.show', compact('article', 'otherArticles'));
        })->name($prefix . '.articles.show');

        // Programs index (controller)
        Route::get('programs', [$controllers['program'], 'index'])->name($prefix . '.programs.index');

        // Program show
        Route::get('program/{id}', function ($id) use ($viewsBase, $prefix, $siteIdMap) {
            // ambil site_id dari map
            $site_id = $siteIdMap[$prefix] ?? null;
            // dd($site_id);
            // Jika tidak ada site_id, fallback find biasa
            if ($site_id) {
                // dd($site_id);
                $program = Program::findOrFail($id);
                $otherPrograms = Program::where('site_id', $site_id)
                    ->where('id', '!=', $id)
                    ->latest()
                    ->take(3)
                    ->get();
            } else {
                $program = Program::findOrFail($id);
                $otherPrograms = Program::where('id', '!=', $id)->latest()->take(3)->get();
            }

            return view($viewsBase . '.program.show', compact('program', 'otherPrograms'));
        })->name($prefix . '.programs.show');

        // Staff (controller)
        Route::get('staff', [$controllers['staff'], 'index'])->name($prefix . '.staff.index');

        // Gallery (controller)
        Route::get('galeri', [$controllers['gallery'], 'index'])->name($prefix . '.gallery.index');
    });
}

buildSiteRoutes('tk', [
    'home' => TkHomeController::class,
    'article' => TkArticleController::class,
    'program' => TkProgramController::class,
    'staff' => TkStaffController::class,
    'gallery' => TkGalleryController::class
], 'sites.tk');

buildSiteRoutes('sd', [
    'home' => SdHomeController::class,
    'article' => SdArticleController::class,
    'program' => SdProgramController::class,
    'staff' => SdStaffController::class,
    'gallery' => SdGalleryController::class
], 'sites.sd');

buildSiteRoutes('smp', [
    'home' => SmpHomeController::class,
    'article' => SmpArticleController::class,
    'program' => SmpProgramController::class,
    'staff' => SmpStaffController::class,
    'gallery' => SmpGalleryController::class
], 'sites.smp');

buildSiteRoutes('sma', [
    'home' => SmaHomeController::class,
    'article' => SmaArticleController::class,
    'program' => SmaProgramController::class,
    'staff' => SmaStaffController::class,
    'gallery' => SmaGalleryController::class
], 'sites.sma');

buildSiteRoutes('yayasan', [
    'home' => HomeYayasanController::class,
    'article' => YayasanArticleController::class,
    'program' => YayasanProgramController::class,
    'staff' => YayasanStaffController::class,
    'gallery' => GalleryController::class
], 'sites.yayasan');
function siteToId($site)
{
    return [
        'yayasan' => 1,
        'tk' => 2,
        'sd' => 3,
        'smp' => 4,
        'sma' => 5,
    ][$site] ?? 1;
}



Route::middleware('auth')->group(function () {

    Route::prefix('dashboard/{site}')
        ->name('dashboard.')
        ->group(function () {

            // DASHBOARD UTAMA
            Route::get('/', function ($site) {
                $site_id = (int) ($site);
                // dd($site);
                $contents = Content::where('site_id', $site_id)->latest()->get();
                $programs = Program::where('site_id', $site_id)->latest()->get();
                $staffs = Staff::where('site_id', $site)->latest()->get();
                $profilezz = CompanyProfile::where('site_id', $site)->latest()->get();

                return view('admin.dashboard', compact('site', 'contents', 'programs', 'staffs'));
            })->name('index');


            /*
            |-----------------------------------------
            | BERITA
            |-----------------------------------------
            */
            Route::get('/berita', [ContentController::class, 'index'])
                ->name('berita.index');

            Route::post('/berita', [ContentController::class, 'store'])
                ->name('berita.store');

            Route::put('/berita/{content}', [ContentController::class, 'update'])
                ->name('berita.update');

            Route::delete('/berita/{content}', [ContentController::class, 'destroy'])
                ->name('berita.destroy');


            /*
            |-----------------------------------------
            | PROGRAM
            |-----------------------------------------
            */
            Route::get('/program', [ProgramController::class, 'index'])
                ->name('program.index');

            Route::post('/program', [ProgramController::class, 'store'])
                ->name('program.store');

            Route::put('/program/{program}', [ProgramController::class, 'update'])
                ->name('program.update');

            Route::delete('/program/{program}', [ProgramController::class, 'destroy'])
                ->name('program.destroy');


            /*
            |-----------------------------------------
            | GALERI
            |-----------------------------------------
            */
            Route::get('/galeri', [GalleryController::class, 'dashboard'])
                ->name('galeri.index');

            Route::post('/galeri', [GalleryController::class, 'store'])
                ->name('galeri.store');

            Route::delete('/galeri/{gallery}', [GalleryController::class, 'destroy'])
                ->name('galeri.destroy');


            /*
            |-----------------------------------------
            | STAFF
            |-----------------------------------------
            */
            Route::get('/staff', [StaffController::class, 'index'])
                ->name('staff.index');

            Route::post('/staff', [StaffController::class, 'store'])
                ->name('staff.store');

            Route::put('/staff/{staff}', [StaffController::class, 'update'])
                ->name('staff.update');

            Route::delete('/staff/{staff}', [StaffController::class, 'destroy'])
                ->name('staff.destroy');

            // COMPANY PROFILE MANAGEMENT
            Route::get('/profile', [CompanyProfileController::class, 'index'])
                ->name('profile.index');

            Route::post('/profile', [CompanyProfileController::class, 'store'])
                ->name('profile.store');

            Route::put('/profile/{profile}', [CompanyProfileController::class, 'update'])
                ->name('profile.update');

            Route::delete('/profile/{profile}', [CompanyProfileController::class, 'destroy'])
                ->name('profile.destroy');


        });

});
