<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index($site)
    {
        // Pastikan $site di-cast ke int jika di DB site_id adalah integer
        // Jika site_id uuid/string, hapus (int)
        $staffs = Staff::where('site_id', $site)->latest()->get();
        return view('admin.staff', compact('staffs', 'site'));
    }

    public function store(Request $request, $site)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'nip'       => 'nullable|string|max:50',
            'role'      => 'required|string|max:100',
            // Cek unik di tabel staffs kolom email
            'email'     => 'required|email|unique:staffs,email',
            'instagram' => 'nullable|string|max:255',
            'facebook'  => 'nullable|string|max:255',
            'linkedin'  => 'nullable|string|max:255',
            'blog'      => 'nullable|string|max:255',
            'photo'     => 'nullable|image|max:2048', // Max 2MB
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('staffs', 'public');
        }

        $validated['site_id'] = $site;

        Staff::create($validated);

        return back()->with('success', 'Staff berhasil ditambahkan!');
    }

    public function update(Request $request, $site, Staff $staff)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'nip'       => 'nullable|string|max:50',
            'role'      => 'required|string|max:100',
            // PENTING: exclude id user saat ini agar tidak error "email has been taken"
            'email'     => 'required|email|unique:staffs,email,' . $staff->id,
            'instagram' => 'nullable|string|max:255',
            'facebook'  => 'nullable|string|max:255',
            'linkedin'  => 'nullable|string|max:255',
            'blog'      => 'nullable|string|max:255',
            'photo'     => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($staff->photo) {
                Storage::disk('public')->delete($staff->photo);
            }
            $validated['photo'] = $request->file('photo')->store('staffs', 'public');
        }

        $staff->update($validated);

        return back()->with('success', 'Staff berhasil diperbarui!');
    }

    public function destroy($site, Staff $staff)
    {
        if ($staff->photo) {
            Storage::disk('public')->delete($staff->photo);
        }

        $staff->delete();

        return back()->with('success', 'Staff berhasil dihapus!');
    }
}
