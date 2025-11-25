<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Program Yayasan</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700&display=swap');
        body { font-family: 'Manrope', sans-serif; }
        .modal {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(0,0,0,0.4);
            z-index: 50;
        }
        .modal.active {
            display: flex;
            animation: fadeIn 0.25s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex">
    {{-- Sidebar --}}
    <x-sidebar />

    {{-- Konten utama --}}
    <main class="flex-1 ml-56 p-8 relative">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Manajemen Program</h1>
                <p class="text-sm text-gray-500">Yayasan Matho’liul Huda</p>
            </div>

            <div class="flex items-center space-x-3">
                <button onclick="openModal()" class="bg-green-700 hover:bg-green-800 text-white font-medium px-4 py-2 rounded-md shadow">
                    + Tambah Program
                </button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Logout</button>
                </form>
            </div>
        </div>

        {{-- Daftar Program --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-green-700 text-white text-sm uppercase tracking-wider">
                    <tr>
                        <th class="p-4 text-left">Judul</th>
                        <th class="p-4 text-left">Deskripsi</th>
                        <th class="p-4 text-left">Gambar</th>
                        <th class="p-4 text-left">Link</th>
                        <th class="p-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($programs as $program)
                        <tr class="hover:bg-green-50 transition">
                            <td class="p-4 font-semibold">{{ $program->name}}</td>
                            <td class="p-4 text-gray-600">{{ Str::limit(strip_tags($program->description), 80) }}</td>
                            <td class="p-4">
                                @if ($program->image)
                                    <img src="{{ asset('storage/' . $program->image) }}" alt="gambar"
                                         class="w-16 h-16 object-cover rounded-lg shadow-sm">
                                @else
                                    <span class="text-gray-400 italic">Tidak ada</span>
                                @endif
                            </td>
                            <td class="p-4">
                                @if ($program->link)
                                    <a href="{{ $program->link }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                                @else
                                    <span class="text-gray-400 italic">Tidak ada</span>
                                @endif
                            </td>
                            <td class="p-4 space-x-2">
                                <button onclick="editProgram(
                                    {{ $program->id }},
                                    '{{ addslashes($program->name) }}',
                                    `{{ addslashes($program->description) }}`,
                                    '{{ $program->link }}'
                                )"
                                        class="text-blue-600 hover:text-blue-800 font-medium">Edit</button>
                                <form action="{{ route('dashboard.program.destroy', ['site' => $site, 'program' => $program->id]) }}"method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this)" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-gray-400 py-6">Belum ada program</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

    {{-- MODAL Tambah / Edit Program --}}
    <div id="modal" class="modal">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg p-6 relative">
            <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                ✕
            </button>

            <h2 class="text-xl font-bold mb-4" id="form-title">Tambah Program</h2>

            <form id="programForm" action="{{ route('dashboard.program.store', ['site' => $site]) }}"  method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="id" id="program_id">

                <div>
                    <label class="block text-sm text-gray-600 mb-1">Judul Program</label>
                    <input type="text" name="title" id="title" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm text-gray-600 mb-1">Deskripsi</label>
                    <textarea name="body" id="body" rows="5" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm text-gray-600 mb-1">Link</label>
                    <input type="url" name="link" id="link"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm text-gray-600 mb-1">Gambar</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full text-sm text-gray-700 border border-gray-300 rounded-md px-3 py-2">
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="text-gray-600 hover:underline">Batal</button>
                    <button type="submit" class="bg-green-700 text-white font-semibold px-6 py-2 rounded-md hover:bg-green-800 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Script --}}
    <script>
        const modal = document.getElementById('modal');
        const form = document.getElementById('programForm');
        const titleEl = document.getElementById('form-title');

        function openModal() {
            modal.classList.add('active');
            form.reset();
            titleEl.innerText = "Tambah Program";
            form.action = "{{ route('dashboard.program.store', ['site' => $site]) }}";
            form.querySelectorAll('input[name="_method"]').forEach(el => el.remove());
        }

        function closeModal() {
            modal.classList.remove('active');
        }

        function editProgram(id, title, body, link) {
            modal.classList.add('active');
            titleEl.innerText = 'Edit Program';
            document.getElementById('program_id').value = id;
            document.getElementById('title').value = title;
            document.getElementById('body').value = body;
            document.getElementById('link').value = link || '';
            form.action = `/dashboard/{{ $site }}/program/${id}`;
            form.querySelectorAll('input[name="_method"]').forEach(el => el.remove());
            form.insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');
            form.querySelectorAll('input[name="_method"]').forEach(el => el.remove());
            form.insertAdjacentHTML('beforeend', '@method("PUT")');
        }

        function confirmDelete(button) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak bisa dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) button.closest('form').submit();
            });
        }
    </script>

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
    @endif
</body>
</html>
