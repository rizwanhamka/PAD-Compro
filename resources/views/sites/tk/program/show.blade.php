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
    <title>{{ $program->name }}</title>
</head>
<body>
    <x-navbarTk />
    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <!-- Wrapper Program -->
        <div class="w-11/12 md:w-4/5 lg:w-3/5 mx-auto py-12">
            <!-- Gambar Header Program -->
            <div class="mb-8 rounded-2xl shadow-lg overflow-hidden">
                @if ($program->image)
                    <img src="{{ asset('storage/' . $program->image) }}"
                         alt="{{ $program->name }}"
                         class="w-full h-48 object-cover">
                @else
                    <img src="{{ asset('images/berita.png') }}"
                         alt="Gambar default"
                         class="w-full h-48 object-cover">
                @endif
            </div>

            <!-- Judul Program -->
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4 leading-snug text-center">
                {{ $program->name }}
            </h1>

            <!-- Metadata Program -->
            <div class="flex justify-center items-center space-x-4 text-gray-500 text-sm mb-10">
                <span>🏛️ Yayasan</span>
                <span>•</span>
                <span>{{ $program->created_at->format('d M Y') }}</span>
            </div>

            <!-- Isi Program -->
            <article class="prose prose-lg max-w-none text-gray-800 leading-relaxed text-justify mb-16">
                {!! nl2br(e($program->description)) !!}
            </article>

            <!-- Tombol Link ke Form Eksternal -->
            @if ($program->link)
                <div class="text-center mt-16">
                    <a href="{{ $program->link }}" target="_blank"
                       class="inline-block bg-red-700 hover:bg-red-800 text-white text-lg font-semibold px-10 py-4 rounded-xl shadow-lg transition duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                        🔗 Kunjungi Formulir Pendaftaran
                    </a>
                </div>
            @endif
        </div>
    </div>

    <x-footer />
</body>
</html>
