<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Tampilkan semua program di dashboard.
     */
    public function index($site)
    {
        $site_id = (int)($site);

        $programs = Program::where('site_id', $site_id)->latest()->get();

        return view('admin.program', compact('programs', 'site'));
    }

    /**
     * Simpan program baru.
     */
    public function store(Request $request, $site)
    {
        $site_id = (int)($site);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'link' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->hasFile('image')
            ? $request->file('image')->store('programs', 'public')
            : null;

        Program::create([
            'site_id' => $site_id,
            'name' => $validated['title'],
            'description' => $validated['body'],
            'link' => $validated['link'] ?? null,
            'image' => $path,
        ]);

        return back()->with('success', 'Program berhasil ditambahkan!');
    }



    /**
     * Update data program.
     */
// Update
public function update(Request $request, $site, $id)
{
    $program = Program::where('site_id', $site)->findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'link' => 'nullable|url'
    ]);

    $data = [
        'name' => $request->title,
        'description' => $request->body,
        'link' => $request->link
    ];

    if ($request->hasFile('image')) {
        if ($program->image) Storage::disk('public')->delete($program->image);
        $data['image'] = $request->file('image')->store('programs', 'public');
    }

    $program->update($data);

    return back()->with('success', 'Program berhasil diperbarui!');
}

// Destroy
public function destroy($site, $id)
{
    $program = Program::where('site_id', $site)->findOrFail($id);

    if ($program->image) Storage::disk('public')->delete($program->image);

    $program->delete();

    return back()->with('success', 'Program berhasil dihapus!');
}

}
