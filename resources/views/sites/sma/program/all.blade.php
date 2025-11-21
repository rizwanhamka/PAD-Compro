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
    <x-navbarSma />
    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="w-4/5 flex flex-col items-center">
            <div class="mb-12 px-10">
                <section class="mx-auto py-12">
                    <!-- Title -->
                    <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center relative inline-block">
                        Program Yayasan
                        <span class="block w-full h-1 bg-green-600 mt-2 mx-auto rounded-full"></span>
                    </h2>

                    <!-- Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                        <!-- Card 1 -->
                        @foreach ($program_all as $program)
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                <img src="{{ asset('storage/' . $program->image) }}"
                                    alt="{{ $program->name }}"
                                    class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-bold mb-2">{{ $program->name }}</h3>
                                    <p class="text-gray-600 text-sm mb-4 text-justify">
                                        {{ Str::limit($program->description, 200, '...') }}
                                    </p>
                                    <a href="{{ url('tk/program/' . $program->id) }}"
                                    class="bg-gray-200 hover:bg-gray-300 text-sm text-black font-semibold px-6 py-2 rounded-lg shadow">
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
</body>
<x-footer />
</html>
