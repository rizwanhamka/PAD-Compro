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
    public function index()
    {
        $programs = Program::where('site_id', 1)
        ->latest()
        ->get();
        return view('admin.program', compact('programs'));
    }

    /**
     * Simpan program baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'link' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('programs', 'public');
        }

        Program::create([
            'site_id' => 1,
            'name' => $validated['title'],
            'description' => $validated['body'],
            'link' => $validated['link'] ?? null,
            'image' => $path,
        ]);

        return redirect()->route('dashboard.program')->with('success', 'Program berhasil ditambahkan!');
    }


    /**
     * Update data program.
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url'
        ]);

        $data = $request->only(['title', 'body', 'link']);

        if ($request->hasFile('image')) {
            if ($program->image) {
                Storage::disk('public')->delete($program->image);
            }
            $data['image'] = $request->file('image')->store('programs', 'public');
        }

        $program->update($data);

        return back()->with('success', 'Program berhasil diperbarui!');
    }

    /**
     * Hapus program.
     */
    public function destroy(Program $program)
    {
        if ($program->image) {
            Storage::disk('public')->delete($program->image);
        }

        $program->delete();

        return back()->with('success', 'Program berhasil dihapus!');
    }
}
