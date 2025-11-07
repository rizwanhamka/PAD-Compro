<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Manajemen Staff</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
        .modal.active { display: flex; animation: fadeIn 0.25s ease-in-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex">
    {{-- Sidebar --}}
    <x-sidebar />

    {{-- Main --}}
    <main class="flex-1 ml-56 p-8 relative">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Manajemen Staff</h1>
                <p class="text-sm text-gray-500">Yayasan Matho’liul Huda</p>
            </div>

            <div class="flex items-center space-x-3">
                <button onclick="openModal()" class="bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2 rounded-md shadow">
                    + Tambah Staff
                </button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Logout</button>
                </form>
            </div>
        </div>

        {{-- Table --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-green-600 text-white text-sm uppercase tracking-wider">
                    <tr>
                        <th class="p-4 text-left">Nama</th>
                        <th class="p-4 text-left">NIP</th>
                        <th class="p-4 text-left">Peran</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Foto</th>
                        <th class="p-4 text-left">Sosial Media</th>
                        <th class="p-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse ($staffs as $staff)
                        <tr class="hover:bg-green-50 transition">
                            <td class="p-4 font-semibold">{{ $staff->name }}</td>
                            <td class="p-4">{{ $staff->nip }}</td>
                            <td class="p-4">{{ $staff->role }}</td>
                            <td class="p-4 text-gray-600">{{ $staff->email }}</td>
                            <td class="p-4">
                                @if ($staff->photo)
                                    <img src="{{ asset('storage/' . $staff->photo) }}" class="w-14 h-14 rounded-full object-cover shadow-sm">
                                @else
                                    <span class="text-gray-400 italic">Tidak ada</span>
                                @endif
                            </td>
                            <td class="p-4 flex space-x-3 text-xl">
                                @if($staff->instagram)<a href="{{ $staff->instagram }}" target="_blank" class="text-pink-500 hover:text-pink-600"><i class="fab fa-instagram"></i></a>@endif
                                @if($staff->facebook)<a href="{{ $staff->facebook }}" target="_blank" class="text-blue-600 hover:text-blue-700"><i class="fab fa-facebook"></i></a>@endif
                                @if($staff->linkedin)<a href="{{ $staff->linkedin }}" target="_blank" class="text-blue-500 hover:text-blue-600"><i class="fab fa-linkedin"></i></a>@endif
                                @if($staff->blog)<a href="{{ $staff->blog }}" target="_blank" class="text-orange-500 hover:text-orange-600"><i class="fas fa-globe"></i></a>@endif
                            </td>
                            <td class="p-4 space-x-2">
                                <button onclick="editStaff({{ $staff->id }}, '{{ addslashes($staff->name) }}', '{{ $staff->nip }}', '{{ $staff->role }}', '{{ $staff->email }}', '{{ $staff->instagram }}', '{{ $staff->facebook }}', '{{ $staff->linkedin }}', '{{ $staff->blog }}')"
                                    class="text-blue-600 hover:text-blue-800 font-medium">Edit</button>
                                <form action="{{ route('staffs.destroy', $staff->id) }}" method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this)" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-gray-400 py-6">Belum ada data staff</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

    {{-- Modal --}}
    <div id="modal" class="modal">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-xl p-6 relative">
            <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">✕</button>
            <h2 class="text-xl font-bold mb-4" id="form-title">Tambah Staff</h2>

            <form id="staffForm" action="{{ route('staffs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="id" id="staff_id">

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Nama</label>
                        <input type="text" name="name" id="name" class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">NIP</label>
                        <input type="text" name="nip" id="nip" class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Peran</label>
                        <input type="text" name="role" id="role" class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Email</label>
                        <input type="email" name="email" id="email" class="w-full border rounded-md px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Instagram</label>
                        <input type="text" name="instagram" id="instagram" placeholder="username saja, tanpa @" class="w-full border rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Facebook</label>
                        <input type="text" name="facebook" id="facebook" placeholder="username profil" class="w-full border rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">LinkedIn</label>
                        <input type="text" name="linkedin" id="linkedin" placeholder="username profil" class="w-full border rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Blog</label>
                        <input type="text" name="blog" id="blog" placeholder="contoh: blogkita.com" class="w-full border rounded-md px-3 py-2">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm text-gray-600 mb-1">Foto</label>
                        <input type="file" name="photo" id="photo" accept="image/*" class="w-full border rounded-md px-3 py-2">
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-3">
                    <button type="button" onclick="closeModal()" class="text-gray-600 hover:underline">Batal</button>
                    <button type="submit" class="bg-green-600 text-white font-semibold px-6 py-2 rounded-md hover:bg-green-700 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Script --}}
    <script>
        const modal = document.getElementById('modal');
        const form = document.getElementById('staffForm');
        const titleEl = document.getElementById('form-title');

        function openModal() {
            modal.classList.add('active');
            form.reset();
            titleEl.innerText = "Tambah Staff";
            form.action = "{{ route('staffs.store') }}";
            form.querySelectorAll('input[name="_method"]').forEach(el => el.remove());
        }

        function closeModal() {
            modal.classList.remove('active');
        }

        function editStaff(id, name, nip, role, email, ig, fb, ln, blog) {
            modal.classList.add('active');
            titleEl.innerText = 'Edit Staff';
            document.getElementById('staff_id').value = id;
            document.getElementById('name').value = name;
            document.getElementById('nip').value = nip;
            document.getElementById('role').value = role;
            document.getElementById('email').value = email;
            document.getElementById('instagram').value = ig || '';
            document.getElementById('facebook').value = fb || '';
            document.getElementById('linkedin').value = ln || '';
            document.getElementById('blog').value = blog || '';
            form.action = `/staffs/${id}`;
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
