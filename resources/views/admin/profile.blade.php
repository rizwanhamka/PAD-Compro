<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Profil {{ $site }}</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700&display=swap');
        body { font-family: 'Manrope', sans-serif; }

        /* Modal Styling */
        .modal {
            position: fixed; inset: 0; display: none;
            align-items: center; justify-content: center;
            background: rgba(0,0,0,0.5); z-index: 50; padding: 1rem;
        }
        .modal.active { display: flex; animation: fadeIn 0.25s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }

        /* Form Styling */
        .form-input:focus {
            outline: none; border-color: #15803d;
            box-shadow: 0 0 0 2px rgba(21, 128, 61, 0.2);
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex">

    {{-- Sidebar --}}
    <x-sidebar />

    {{-- Main Content --}}
    <main class="flex-1 ml-56 p-8 relative">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Manajemen Profil</h1>
                <p class="text-sm text-gray-500">Site ID: <span class="font-mono bg-gray-200 px-2 py-0.5 rounded">{{ $site }}</span></p>
            </div>

            <div class="flex items-center gap-3">
                {{-- Tombol Dynamic: Cek apakah data sudah tersimpan di DB --}}
                <button onclick="openModal()" class="bg-green-700 text-white font-medium px-5 py-2.5 rounded-lg hover:bg-green-800 shadow transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    {{ $profilezz->exists ? 'Edit Profil' : 'Lengkapi Profil' }}
                </button>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="bg-white border border-gray-300 text-gray-700 px-4 py-2.5 rounded-lg hover:bg-gray-100 transition font-medium shadow-sm">Logout</button>
                </form>
            </div>
        </div>

        {{-- Content Card (Preview Tampilan) --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">

            {{-- Identitas Utama --}}
            <div class="bg-green-50 p-6 border-b border-green-100">
                <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">
                    <div>
                        {{-- Handle NULL: Jika nama kosong, tampilkan placeholder --}}
                        <h2 class="text-3xl font-bold text-green-900">{{ $profilezz->nama ?? 'Nama Belum Diisi' }}</h2>
                        <p class="text-green-700 text-lg">{{ $profilezz->title ?? 'Judul Website Belum Diisi' }}</p>
                    </div>
                    <div class="text-sm text-gray-600 space-y-1 bg-white p-4 rounded-lg shadow-sm border border-green-100">
                        <div class="flex items-center gap-2">
                            <span class="w-5 h-5 flex items-center justify-center bg-green-100 text-green-700 rounded-full text-xs">✉</span>
                            <span>{{ $profilezz->email ?? '-' }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-5 h-5 flex items-center justify-center bg-green-100 text-green-700 rounded-full text-xs">📞</span>
                            <span>{{ $profilezz->phone ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Kolom Kiri: Teks --}}
                <div class="lg:col-span-2 space-y-8">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3 border-l-4 border-green-600 pl-3">Deskripsi Singkat</h3>
                        <div class="text-gray-600 leading-relaxed whitespace-pre-line text-justify bg-gray-50 p-4 rounded-lg border border-gray-100">
                            {{ $profilezz->deskripsi ?? 'Belum ada deskripsi.' }}
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3 border-l-4 border-green-600 pl-3">Tentang Kami (About Us)</h3>
                        <div class="text-gray-600 leading-relaxed whitespace-pre-line text-justify">
                            {{ $profilezz->about_us ?? 'Belum ada informasi About Us.' }}
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Media --}}
                <div class="space-y-8">
                    {{-- Carousel --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3">Galeri Carousel</h3>
                        <div class="grid grid-cols-1 gap-3">
                            @foreach (['carousel_1','carousel_2','carousel_3'] as $index => $img)
                                <div class="relative group rounded-xl overflow-hidden border border-gray-200 shadow-sm aspect-[16/9] bg-gray-100">
                                    @if ($profilezz->$img)
                                        <img src="{{ asset('storage/'.$profilezz->$img) }}" class="w-full h-full object-cover transition transform group-hover:scale-105">
                                        <div class="absolute bottom-0 left-0 bg-black/50 text-white text-xs px-2 py-1 rounded-tr-lg">Slide {{ $index + 1 }}</div>
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                            <span class="text-xs">Gambar Kosong</span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- YouTube --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3">Video Profil</h3>
                        @if ($profilezz->youtube)
                            <div class="rounded-xl overflow-hidden shadow-md bg-black">
                                <iframe class="w-full aspect-video"
                                    src="https://www.youtube.com/embed/{{ $profilezz->youtube }}?rel=0"
                                    title="YouTube video player" frameborder="0" allowfullscreen>
                                </iframe>
                            </div>
                        @else
                            <div class="w-full aspect-video bg-gray-100 rounded-xl flex items-center justify-center border border-dashed border-gray-300">
                                <p class="text-gray-400 italic text-sm">Belum ada link YouTube</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- MODAL FORM (Create & Edit jadi satu) --}}
    <div id="modal" class="modal">
        <div class="bg-white w-full max-w-4xl rounded-xl shadow-2xl p-0 relative overflow-hidden flex flex-col max-h-[90vh]">

            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h2 class="text-xl font-bold text-gray-800">
                    {{ $profilezz->exists ? 'Edit Profil Website' : 'Lengkapi Profil Baru' }}
                </h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-red-500 transition text-2xl leading-none">&times;</button>
            </div>

            <div class="p-6 overflow-y-auto custom-scrollbar">

                {{-- FORM ACTION OTOMATIS: --}}
                {{-- Jika data ada (exists=true) -> Masuk ke route UPDATE --}}
                {{-- Jika data tidak ada (exists=false) -> Masuk ke route STORE --}}

                <form action="{{ $profilezz->exists ? route('dashboard.profile.update', ['site'=>$site, 'profile'=>$profilezz->id]) : route('dashboard.profile.store', ['site'=>$site]) }}"
                      method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Tambahkan method PUT hanya jika sedang Update --}}
                    @if($profilezz->exists)
                        @method('PUT')
                    @endif

                    {{-- Section: Informasi Dasar --}}
                    <div>
                        <h3 class="text-sm font-bold text-green-700 uppercase tracking-wide mb-3 border-b pb-1">Informasi Dasar</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm text-gray-600 mb-1 font-medium">Nama Yayasan/Sekolah</label>
                                {{-- Value: Gunakan old() agar input tidak hilang saat error validasi. Jika tidak ada old, ambil dari DB. --}}
                                <input type="text" name="nama" value="{{ old('nama', $profilezz->nama) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 form-input"
                                    required placeholder="Contoh: SMA Matholiul Huda">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1 font-medium">Judul Website</label>
                                <input type="text" name="title" value="{{ old('title', $profilezz->title) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 form-input" required>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1 font-medium">Email</label>
                                <input type="email" name="email" value="{{ old('email', $profilezz->email) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 form-input">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1 font-medium">Telepon</label>
                                <input type="text" name="phone" value="{{ old('phone', $profilezz->phone) }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 form-input">
                            </div>
                        </div>
                    </div>

                    {{-- Section: Konten --}}
                    <div>
                        <h3 class="text-sm font-bold text-green-700 uppercase tracking-wide mb-3 border-b pb-1">Konten Website</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-600 mb-1 font-medium">Deskripsi Singkat</label>
                                <textarea name="deskripsi" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 form-input">{{ old('deskripsi', $profilezz->deskripsi) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1 font-medium">About Us</label>
                                <textarea name="about_us" rows="6" class="w-full border border-gray-300 rounded-lg px-3 py-2 form-input">{{ old('about_us', $profilezz->about_us) }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Section: Media --}}
                    <div>
                        <h3 class="text-sm font-bold text-green-700 uppercase tracking-wide mb-3 border-b pb-1">Media</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm text-gray-600 mb-1 font-medium">Link YouTube</label>
                                {{-- Logic: Jika ada ID youtube, gabungkan jadi link lengkap agar user mudah edit --}}
                                <input type="text" name="youtube" value="{{ old('youtube', $profilezz->youtube ? 'https://youtu.be/'.$profilezz->youtube : '') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 form-input"
                                    placeholder="Contoh: https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                            </div>

                            @foreach(['carousel_1','carousel_2','carousel_3'] as $index => $field)
                            <div class="border p-3 rounded-lg bg-gray-50 flex items-center gap-4">
                                <div class="flex-1">
                                    <label class="block text-sm text-gray-600 mb-1 font-medium">Gambar Slide {{ $index + 1 }}</label>
                                    <input type="file" name="{{ $field }}" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-green-700 hover:file:bg-green-200" accept="image/*">
                                </div>
                                @if($profilezz->$field)
                                    <div class="w-16 h-16 rounded overflow-hidden shadow border">
                                        <img src="{{ asset('storage/'.$profilezz->$field) }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="pt-4 flex justify-end gap-3">
                        <button type="button" onclick="closeModal()" class="px-5 py-2.5 rounded-lg text-gray-600 hover:bg-gray-100 font-medium transition">Batal</button>
                        <button type="submit" class="bg-green-700 text-white px-6 py-2.5 rounded-lg hover:bg-green-800 font-medium shadow-md transition transform active:scale-95">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script Modal & SweetAlert --}}
    <script>
        const fileInputs = document.querySelectorAll('input[type="file"]');
        const maxSizeInBytes = 2 * 1024 * 1024; // 2 MB

        fileInputs.forEach(input => {
            input.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const fileSize = this.files[0].size;

                    if (fileSize > maxSizeInBytes) {
                        // 1. Reset nilai input agar file tidak jadi di-upload
                        this.value = '';

                        // 2. Tampilkan Peringatan dengan SweetAlert
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
        const modal = document.getElementById('modal');
        function openModal(){ modal.classList.add('active'); }
        function closeModal(){ modal.classList.remove('active'); }

        // Klik di luar modal untuk menutup
        modal.addEventListener('click', (e) => {
            if(e.target === modal) closeModal();
        });
    </script>

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
