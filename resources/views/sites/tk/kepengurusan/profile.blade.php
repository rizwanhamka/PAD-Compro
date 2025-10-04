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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Document</title>
</head>
<x-navbar />
<body>
    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="w-4/5 flex flex-col items-center">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 py-20">
                {{-- card --}}
                @for ($i = 1; $i <= 10; $i++)
                <div class="bg-white p-8 rounded-lg border border-gray-200 shadow-lg">
                    <div class="flex items-start gap-6">
                        <!-- Foto -->
                        <div class="w-28 h-28 bg-gray-200 rounded-md flex items-center justify-center">
                            <span class="text-gray-400 text-sm">Foto</span>
                        </div>

                        <!-- Detail -->
                        <div class="flex-1">
                            <div class="grid grid-cols-3 gap-y-4 text-base">
                                <p class="font-semibold text-gray-700">Nama</p>
                                <p class="col-span-2 text-gray-700 font-medium">Ahmad Rizwan Hamka</p>

                                <p class="font-semibold text-gray-700">NIP</p>
                                <p class="col-span-2 text-gray-700">123456789</p>

                                <p class="font-semibold text-gray-700">Peran</p>
                                <p class="col-span-2 text-gray-700">Ketua Yayasan</p>

                                <p class="font-semibold text-gray-700">Email</p>
                                <p class="col-span-2 text-gray-700">rizwan@example.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sosial Media -->
                    <div class="mt-6 flex space-x-5">
                        <a href="#" class="text-gray-600 hover:text-pink-500 text-3xl"><i class="fab fa-instagram-square"></i></a>
                        <a href="#" class="text-gray-600 hover:text-blue-600 text-3xl"><i class="fab fa-facebook-square"></i></a>
                        <a href="#" class="text-gray-600 hover:text-blue-500 text-3xl"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-gray-600 hover:text-orange-500 text-3xl"><i class="fab fa-blogger"></i></a>
                    </div>
                </div>
                @endfor
            </div>

        </div>
    </div>
</body>
<x-footer/>
</html>
