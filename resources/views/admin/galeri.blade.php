<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Galeri - Dashboard</title>
    @vite('resources/css/app.css')

    {{-- 1. PENTING: Import SweetAlert2 disini --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition">Logout</button>
            </form>
        </div>

        {{-- Form Upload --}}
        <form action="{{ route('dashboard.galeri.store', ['site' => $site]) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-md mb-10 border border-gray-100">
            @csrf
            <div class="flex flex-col sm:flex-row sm:items-end gap-4">
                <div class="flex-1">
                    <label class="block text-sm text-gray-700 mb-1 font-medium">Judul (opsional)</label>
                    <input type="text" name="title" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 p-2 border">
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1 font-medium">Upload Gambar</label>
                    {{-- Input file ini akan divalidasi oleh Script di bawah --}}
                    <input type="file" name="image" accept="image/*" required class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-green-50 file:text-green-700
                        hover:file:bg-green-100 cursor-pointer border rounded-lg p-1">
                </div>
                <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-6 py-2 rounded-lg shadow-md transition">Upload</button>
            </div>
            <p class="text-xs text-gray-400 mt-2">*Maksimal ukuran file 2 MB</p>
        </form>

        {{-- Daftar Gambar --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($galleries as $gallery)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition border border-gray-100">
                    <div class="h-48 overflow-hidden relative group">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Gambar Galeri' }}" class="w-full h-full object-cover transition transform group-hover:scale-110">
                    </div>
                    <div class="p-4 flex justify-between items-center">
                        <p class="text-sm text-gray-700 truncate font-medium">{{ $gallery->title ?? 'Tanpa Judul' }}</p>

                        {{-- Form Hapus --}}
                        <form action="{{ route('dashboard.galeri.destroy', ['site' => $site, 'gallery' => $gallery->id]) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            {{-- Kita ganti onsubmit biasa dengan tombol type button yang memicu SweetAlert --}}
                            <button type="button" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700 text-sm font-semibold bg-red-50 px-3 py-1 rounded hover:bg-red-100 transition">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center bg-white rounded-xl border border-dashed border-gray-300">
                    <p class="text-gray-400 italic">Belum ada gambar di galeri.</p>
                </div>
            @endforelse
        </div>
    </main>

    {{-- SCRIPT JAVASCRIPT --}}
    <script>
        // --- 1. VALIDASI UKURAN FILE (Maks 2MB) ---
        const fileInputs = document.querySelectorAll('input[type="file"]');
        const maxSizeInBytes = 2 * 1024 * 1024; // 2 MB

        fileInputs.forEach(input => {
            input.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const fileSize = this.files[0].size;

                    if (fileSize > maxSizeInBytes) {
                        // Reset input
                        this.value = '';

                        // Tampilkan Alert Error
                        Swal.fire({
                            icon: 'error',
                            title: 'Ukuran File Terlalu Besar',
                            text: 'Maksimal ukuran file gambar adalah 2 MB. Silakan pilih gambar lain.',
                            confirmButtonColor: '#15803d'
                        });
                    }
                }
            });
        });

        // --- 2. KONFIRMASI HAPUS (Agar konsisten pakai SweetAlert) ---
        function confirmDelete(button) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Gambar yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form terdekat dari tombol yang diklik
                    button.closest('form').submit();
                }
            })
        }
    </script>

    {{-- --- 3. NOTIFIKASI SUKSES (Dari Session Controller) --- --}}
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false,
                confirmButtonColor: '#15803d'
            });
        </script>
    @endif

</body>
</html>
