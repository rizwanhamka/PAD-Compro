<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Matho’liul Huda</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700&display=swap');
        body {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex">
    {{-- Sidebar --}}
    <x-sidebar />

    {{-- Konten utama --}}
    <main class="flex-1 ml-56 p-10">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Dashboard Admin</h1>
                <p class="text-gray-500 text-sm mt-1">Pilih bagian yang ingin dikelola</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">
                    Logout
                </button>
            </form>
        </div>

        {{-- Pilihan Manajemen --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Manajemen Berita --}}
            <a href="{{ route('dashboard.berita') }}"
                class="bg-white shadow-md rounded-xl p-6 border border-gray-100 hover:shadow-lg transition group">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-green-100 text-green-700 flex items-center justify-center rounded-full text-xl font-bold">📰</div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-green-700">Manajemen Berita</h2>
                </div>
                <p class="text-sm text-gray-500">Kelola berita untuk setiap unit (Yayasan, TK, SD, SMP, SMA).</p>
            </a>

            {{-- Manajemen Galeri --}}
            <a href="{{ route('dashboard.galeri') }}"
                class="bg-white shadow-md rounded-xl p-6 border border-gray-100 hover:shadow-lg transition group">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-blue-100 text-blue-700 flex items-center justify-center rounded-full text-xl font-bold">🖼️</div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-blue-700">Manajemen Galeri</h2>
                </div>
                <p class="text-sm text-gray-500">Kelola foto & dokumentasi kegiatan yayasan.</p>
            </a>
            {{-- Manajemen Program --}}
            <a href="{{ route('dashboard.program') }}"
                class="bg-white shadow-md rounded-xl p-6 border border-gray-100 hover:shadow-lg transition group">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-700 flex items-center justify-center rounded-full text-xl font-bold">📘</div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-emerald-700">Manajemen Program</h2>
                </div>
                <p class="text-sm text-gray-500">Kelola daftar program yayasan beserta deskripsi dan link pendaftaran.</p>
            </a>

            {{-- Manajemen Staff--}}
            <a href="{{ route('dashboard.staff') }}"
                class="bg-white shadow-md rounded-xl p-6 border border-gray-100 hover:shadow-lg transition group">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-12 h-12 bg-amber-100 text-amber-700 flex items-center justify-center rounded-full text-xl font-bold">
                        🏛️
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-amber-700">
                        Manajemen Staff
                    </h2>
                </div>
                <p class="text-sm text-gray-500">
                    Kelola struktur organisasi lembaga, data anggota, dan tautan media sosial mereka.
                </p>
            </a>

        </div>
    </main>
</body>
</html>
