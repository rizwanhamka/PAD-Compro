<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Galeri - Dashboard</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700&display=swap');
        body { font-family: 'Manrope', sans-serif; }
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
                <h1 class="text-3xl font-bold text-gray-800">Manajemen Galeri</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola foto & dokumentasi kegiatan.</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Logout</button>
            </form>
        </div>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form Upload --}}
        <form action="{{ route('dashboard.galeri.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-md mb-10">
            @csrf
            <div class="flex flex-col sm:flex-row sm:items-end gap-4">
                <div class="flex-1">
                    <label class="block text-sm text-gray-700 mb-1">Judul (opsional)</label>
                    <input type="text" name="title" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Upload Gambar</label>
                    <input type="file" name="image" accept="image/*" required class="border border-gray-300 rounded-md p-2">
                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md shadow-md">Upload</button>
            </div>
        </form>

        {{-- Daftar Gambar --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($galleries as $gallery)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Gambar Galeri' }}" class="w-full h-48 object-cover">
                    <div class="p-4 flex justify-between items-center">
                        <p class="text-sm text-gray-700 truncate">{{ $gallery->title ?? '-' }}</p>
                        <form action="{{ route('dashboard.galeri.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-full text-center">Belum ada gambar di galeri.</p>
            @endforelse
        </div>
    </main>
</body>
</html>
