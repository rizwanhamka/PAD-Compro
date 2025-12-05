<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * LIST BERITA PER SITE
     */
public function index($site)
{
    $site_id = (int) ($site);
    // dd($site_id);
    $contents = Content::where('site_id', $site_id)->latest()->get();
    return view('admin.berita', compact('contents', 'site'));
}



    /**
     * STORE BERITA PER SITE
     */
    public function store(Request $request, $site)
    {
        $site_id = (int)($site);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['site_id'] = $site_id;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('contents', 'public');
        }

        Content::create($data);

        return back()->with('success', 'Berita berhasil ditambahkan!');
    }


    /**
     * UPDATE BERITA PER SITE
     */
    public function update(Request $request, $site, Content $content)
    {
        $site_id = (int)($site);

        // CEK: berita harus milik site yang benar → keamanan
        if ($content->site_id != $site_id) {
            abort(403, 'Akses tidak diizinkan.');
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // handle update image
        if ($request->hasFile('image')) {
            if ($content->image) {
                Storage::disk('public')->delete($content->image);
            }
            $data['image'] = $request->file('image')->store('contents', 'public');
        }

        $content->update($data);

        return back()->with('success', 'Berita berhasil diperbarui!');
    }


    /**
     * DELETE BERITA PER SITE
     */
    public function destroy($site, Content $content)
    {
        $site_id = (int)($site);

        // CEK: berita harus milik site yang sedang diakses
        if ($content->site_id != $site_id) {
            abort(403, 'Akses tidak diizinkan.');
        }

        if ($content->image) {
            Storage::disk('public')->delete($content->image);
        }

        $content->delete();

        return back()->with('success', 'Berita berhasil dihapus!');
    }
}
