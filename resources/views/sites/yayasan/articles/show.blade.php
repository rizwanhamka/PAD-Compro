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
                <img src="{{ asset('images/artikel.png') }}" alt="Logo" class=" py-10">
                <h1 class="text-2xl font-bold mb-6">
                    {{$article->title}}
                </h1>
                <p class="text-gray-900 leading-relaxed text-justify">{{$article->body}}</p>
            </div>

        </div>
    </div>
</body>
</html>
