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
    <title>Document</title>
</head>
<body>
    <x-navbarSd />
    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <!-- Wrapper Artikel -->
        <div class="w-11/12 md:w-4/5 lg:w-3/5 mx-auto py-12">
            <!-- Gambar Header Artikel -->
            <div class="mb-8 rounded-2xl shadow-lg overflow-hidden">
                @if ($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}"
                            alt="{{ $article->title }}"
                            class="w-full h-48 object-cover">
                @else
                    <img src="{{ asset('images/artikel.png') }}"
                            alt="Gambar default"
                            class="w-full h-48 object-cover">
                @endif
            </div>

            <!-- Judul Artikel -->
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4 leading-snug text-center">
                {{ $article->title }}
            </h1>

            <!-- Metadata Artikel -->
            <div class="flex justify-center items-center space-x-4 text-gray-500 text-sm mb-10">
                <span>✍️ Admin</span>
                <span>•</span>
                <span>{{ $article->created_at->format('d M Y') }}</span>
            </div>

            <!-- Isi Artikel -->
            <article class="prose prose-lg max-w-none text-gray-800 leading-relaxed text-justify mb-16">
                {!! nl2br(e($article->body)) !!}
            </article>

            <!-- Berita Lainnya -->
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Berita Lainnya</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($otherArticles as $item)
                        <a href="{{ url('yayasan/article/'.$item->id) }}"
                        class="block bg-white rounded-2xl shadow-md hover:shadow-xl transition transform hover:-translate-y-1 duration-300 overflow-hidden">

                            <div class="relative h-48">
                                <img src="{{ asset('images/artikel.png') }}"
                                    alt="{{ $item->title }}"
                                    class="w-full h-full object-cover">

                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 hover:opacity-100 transition duration-300"></div>
                            </div>

                            <div class="p-5">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-sm text-gray-500 mb-3">{{ $item->created_at->format('d M Y') }}</p>
                                <p class="text-gray-700 text-sm line-clamp-3">
                                    {!! Str::limit(strip_tags($item->body), 150) !!}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>


        </div>
    </div>



</body>
<x-footer />
</html>
