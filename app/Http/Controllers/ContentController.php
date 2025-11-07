<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::where('site_id', 1)->latest()->get();
        return view('admin.berita', compact('contents'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'site_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // simpan ke storage/app/public/contents
            $path = $request->file('image')->store('contents', 'public');
            $data['image'] = $path;
        }

        Content::create($data);

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan!');
    }

    public function update(Request $request, Content $content)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $data = $request->only(['title', 'body']);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('berita', 'public');
        $data['image'] = $path;
    }

    $content->update($data);

    return redirect()->back()->with('success', 'Berita berhasil diperbarui!');
}

    public function destroy(Content $content)
    {
        if ($content->image) {
            Storage::disk('public')->delete($content->image);
        }

        $content->delete();
        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }
}
