<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Yayasan - Matho’liul Huda</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700&display=swap');
        body { font-family: 'Manrope', sans-serif; }
    </style>
</head>

<x-navbarTk />

<body class="bg-gray-50 min-h-screen">
    <div class="flex justify-center items-center py-20">
        <div class="w-4/5 flex flex-col items-center">
            <h1 class="text-3xl font-bold text-red-700 mb-10">Struktur Kepengurusan Yayasan</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
                @forelse ($staffs as $staff)
                    <div class="bg-white p-8 rounded-lg border border-gray-200 shadow-lg hover:shadow-xl transition">
                        <div class="flex items-start gap-6">
                            <!-- Foto -->
                            <div class="w-28 h-28 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden">
                                @if ($staff->photo)
                                    <img src="{{ asset('storage/' . $staff->photo) }}" alt="{{ $staff->name }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-gray-400 text-sm">Foto</span>
                                @endif
                            </div>

                            <!-- Detail -->
                            <div class="flex-1">
                                <div class="grid grid-cols-3 gap-y-4 text-base">
                                    <p class="font-semibold text-gray-700">Nama</p>
                                    <p class="col-span-2 text-gray-700 font-medium">{{ $staff->name }}</p>

                                    <p class="font-semibold text-gray-700">NIP</p>
                                    <p class="col-span-2 text-gray-700">{{ $staff->nip }}</p>

                                    <p class="font-semibold text-gray-700">Peran</p>
                                    <p class="col-span-2 text-gray-700">{{ $staff->role }}</p>

                                    <p class="font-semibold text-gray-700">Email</p>
                                    <p class="col-span-2 text-gray-700">{{ $staff->email }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sosial Media -->
                    <div class="mt-6 flex space-x-5">
                        @if ($staff->instagram)
                            <a href="{{ "https://www.instagram.com/" . $staff->instagram }}" target="_blank" class="text-gray-600 hover:text-pink-500 text-3xl">
                                <i class="fab fa-instagram-square"></i>
                            </a>
                        @endif

                        @if ($staff->facebook)
                            <a href="{{ $staff->facebook }}" target="_blank" class="text-gray-600 hover:text-blue-600 text-3xl">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        @endif

                        @if ($staff->linkedin)
                            <a href="{{ $staff->linkedin }}" target="_blank" class="text-gray-600 hover:text-blue-500 text-3xl">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        @endif

                        @if ($staff->blog)
                            <a href="{{ $staff->blog }}" target="_blank" class="text-gray-600 hover:text-orange-500 text-3xl">
                                <i class="fab fa-blogger"></i>
                            </a>
                        @endif
                    </div>

                    </div>
                @empty
                    <p class="text-gray-500 col-span-2 text-center py-10">Belum ada data staff yayasan.</p>
                @endforelse
            </div>
        </div>
    </div>
</body>

<x-footer />
</html>
