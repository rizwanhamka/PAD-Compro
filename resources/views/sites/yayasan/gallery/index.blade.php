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
    <x-navbar />
    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="w-4/5 flex flex-col items-center">
            <div class="mb-12 px-10">
                <section class="mx-auto py-12">
                    <!-- Title -->
                    <h2 class="inline-block bg-green-800 text-white text-lg font-semibold px-6 py-3 rounded-full mb-8 shadow-md">
                        Galeri
                    </h2>

                    <!-- Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                        <!-- Card 1 -->
                        @for ($i = 1; $i < 10; $i++)
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                                <img src="{{ asset('images/artikel.png') }}" alt="Program 1" class="w-full h-48 object-cover">

                            </div>
                        @endfor
                    </div>
                </section>
            </div>

        </div>
    </div>
</body>
<x-footer />
</html>
