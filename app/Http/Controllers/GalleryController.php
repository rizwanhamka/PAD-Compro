<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Halaman galeri publik
    public function index()
    {
        $galleries = Gallery::where('site_id', 1)
        ->latest()
        ->get();
        return view('sites.yayasan.gallery.index', compact('galleries'));
    }

    // ✅ Halaman dashboard admin untuk galeri
    public function dashboard($site)
    {
        $site_id = (int)($site);

        $galleries = Gallery::where('site_id', $site_id)->latest()->get();

        return view('admin.galeri', compact('galleries', 'site'));
    }

    // ✅ Upload gambar galeri
    public function store(Request $request, $site)
    {
        $site_id = (int)($site);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'site_id' => $site_id,
            'title' => $request->title,
            'image' => $path,
        ]);

        return back()->with('success', 'Gambar berhasil diupload!');
    }

    // ✅ Hapus gambar galeri
    public function destroy($site, Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return back()->with('success', 'Gambar berhasil dihapus!');
    }

}
