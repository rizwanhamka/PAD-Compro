<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');
        body { font-family: 'Manrope', sans-serif; }
    </style>
    <title>Galeri Yayasan</title>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">
    <x-navbarSd />

    <main class="flex-grow flex justify-center py-16">
        <div class="w-4/5 flex flex-col items-center">
            <div class="mb-12 px-10 w-full">
                <section class="mx-auto">
                    <!-- Title -->
                    <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center relative inline-block">
                        Galeri Yayasan
                        <span class="block w-full h-1 bg-green-600 mt-2 mx-auto rounded-full"></span>
                    </h2>

                    <!-- Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse ($galleries as $gallery)
                            <div class="relative bg-white rounded-2xl shadow-lg overflow-hidden group">
                                <img src="{{ asset('storage/' . $gallery->image) }}"
                                    alt="{{ $gallery->title ?? 'Galeri Yayasan' }}"
                                    class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">

                                @if (!empty($gallery->title))
                                    <!-- Gradasi lembut di bawah -->
                                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/60 via-transparent to-transparent h-20 flex items-end opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <p class="text-white font-medium text-sm px-4 pb-3">{{ $gallery->title }}</p>
                                    </div>
                                @endif
                            </div>

                        @empty
                            <p class="text-gray-500 col-span-full text-center">Belum ada gambar di galeri.</p>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </main>

    <x-footer />
</body>
</html>
