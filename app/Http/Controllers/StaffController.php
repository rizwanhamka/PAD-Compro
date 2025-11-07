<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::where('site_id', 1)->get();
        return view('admin.staff', compact('staffs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'role' => 'required|string|max:100',
            'email' => 'required|email',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'blog' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('staffs', 'public');
        }

        $validated['site_id'] = 1;

        Staff::create($validated);

        return back()->with('success', 'Staff berhasil ditambahkan!');
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'role' => 'required|string|max:100',
            'email' => 'required|email',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'blog' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($staff->photo) Storage::disk('public')->delete($staff->photo);
            $validated['photo'] = $request->file('photo')->store('staffs', 'public');
        }

        $staff->update($validated);

        return back()->with('success', 'Staff berhasil diperbarui!');
    }

    public function destroy(Staff $staff)
    {
        if ($staff->photo) Storage::disk('public')->delete($staff->photo);
        $staff->delete();

        return back()->with('success', 'Staff berhasil dihapus!');
    }
}
