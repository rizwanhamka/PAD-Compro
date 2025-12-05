<?php

namespace App\Http\Controllers;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function index($site)
    {
        $site_id = (int) $site;
        // dd($site_id);
        // Sesuai View → harus firstOrNew dan bukan first/get
        $profilezz = CompanyProfile::firstOrNew(['site_id' => $site_id]);

        return view('admin.profile', compact('profilezz', 'site'));
    }

    public function store(Request $request, $site)
    {
        $site_id = (int) $site;

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'nama'  => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'about_us' => 'nullable|string',
            'youtube' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'carousel_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'carousel_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'carousel_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data['site_id'] = $site_id;

        // Extract YouTube ID
        if ($data['youtube']) {
            preg_match('/(?:v=|youtu\.be\/)([A-Za-z0-9_-]{11})/', $data['youtube'], $match);
            $data['youtube'] = $match[1] ?? $data['youtube'];
        }

        foreach (['carousel_1','carousel_2','carousel_3'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('profile/carousel', 'public');
            }
        }

        CompanyProfile::create($data);

        return back()->with('success', 'Profil berhasil dibuat!');
    }

    public function update(Request $request, $site)
    {
        $site_id = (int) $site;

        // Again: mengikuti logic view (harus firstOrNew)
        $profile = CompanyProfile::firstOrNew(['site_id' => $site_id]);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'nama'  => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'about_us' => 'nullable|string',
            'youtube' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'carousel_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'carousel_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'carousel_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($data['youtube']) {
            preg_match('/(?:v=|youtu\.be\/)([A-Za-z0-9_-]{11})/', $data['youtube'], $match);
            $data['youtube'] = $match[1] ?? $data['youtube'];
        }

        foreach (['carousel_1','carousel_2','carousel_3'] as $field) {
            if ($request->hasFile($field)) {

                if ($profile->$field && Storage::disk('public')->exists($profile->$field)) {
                    Storage::disk('public')->delete($profile->$field);
                }

                $data[$field] = $request->file($field)->store('profile/carousel','public');
            }
        }

        $profile->fill($data)->save();

        return back()->with('success', 'Profil berhasil disimpan!');
    }
}
