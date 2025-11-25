<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');
        body { font-family: 'Manrope', sans-serif; }
    </style>
    <title>Berita Terkini - Tk Matho’liul Huda</title>
</head>
<body>
    <x-navbarSd />

    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="w-4/5 flex flex-col items-center">
            <div class="mb-12 px-10">
                <section class="mx-auto py-12">
                    <!-- Title -->
                    <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center relative inline-block">
                        Berita Terkini
                        <span class="block w-full h-1 bg-yellow-600 mt-2 mx-auto rounded-full"></span>
                    </h2>

                    <!-- Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($berita_all as $berita)
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col transform transition duration-300 hover:scale-105 hover:shadow-2xl hover:-translate-y-1">

                                <!-- Gambar dinamis -->
                                @if ($berita->image)
                                    <img src="{{ asset('storage/' . $berita->image) }}"
                                         alt="{{ $berita->title }}"
                                         class="w-full h-48 object-cover">
                                @else
                                    <img src="{{ asset('images/artikel.png') }}"
                                         alt="Gambar default"
                                         class="w-full h-48 object-cover">
                                @endif

                                <div class="p-4 flex flex-col flex-grow">
                                    <h3 class="text-lg font-bold mb-1">{{ $berita->title }}</h3>
                                    <p class="text-gray-400 text-xs mb-2">{{ $berita->created_at->format('d M Y') }}</p>
                                    <p class="text-gray-600 text-sm mb-4 text-justify">
                                        {{ Str::words(strip_tags($berita->body), 30, '...') }}
                                    </p>
                                    <a href="{{ url('sd/article/' . $berita->id) }}"
                                       class="mt-auto bg-gray-200 hover:bg-gray-300 text-sm text-black font-semibold px-6 py-2 rounded-lg shadow self-start transition duration-300">
                                       Baca Selengkapnya &raquo;
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>

    <x-footer />
</body>
</html>
