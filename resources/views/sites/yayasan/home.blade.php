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
    <title>Yayasan Matho’lil Huda</title>

</head>
<body>
    <x-navbar />

    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="w-4/5 flex flex-col items-center">
            <!-- Bagian Judul -->
            {{-- GANTI PT PAS UDAH ADA GAMBAR BG --}}
            <div class="mb-12 px-10 py-40">
                <h1 class="text-3xl font-bold mb-6">
                    Matho’lil Huda
                </h1>
                <p class="text-gray-700 leading-relaxed text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde quisquam sunt aliquid aspernatur exercitationem fuga officiis aperiam nihil, quae eos sit deleniti, perspiciatis cupiditate et corporis iure itaque deserunt non! Necessitatibus reiciendis repudiandae assumenda dolore earum perferendis maxime eos eius laudantium repellendus beatae magni nam, sed sint deleniti dolorem rem praesentium sit excepturi magnam nihil quos. Veniam veritatis maxime minima corrupti quia dicta labore doloribus dolor nisi, soluta consequatur dignissimos nostrum, voluptatibus facere recusandae nemo neque aspernatur ab eius possimus quisquam quae sapiente aliquam nesciunt. Nobis corrupti perspiciatis dolor eveniet, iste saepe hic voluptates quaerat reprehenderit aspernatur, rerum ex a voluptate! Explicabo eum dicta necessitatibus aspernatur id autem soluta ad adipisci sequi iure recusandae, vero laudantium molestiae nulla, quae quis, obcaecati culpa non facere deleniti neque. Facilis libero temporibus eius quaerat sint eaque, commodi sunt natus debitis quia a ad error nihil architecto cupiditate alias, veniam iure nemo. Facere deleniti velit sunt cum, quo recusandae omnis nostrum iusto, repellat ut maiores eligendi repudiandae eos magni. Eaque ipsa recusandae esse vero corporis perspiciatis. Eius, impedit similique! Culpa, eos adipisci a aliquam itaque doloribus porro consequuntur, corporis magnam quae unde beatae saepe quas! Odio aliquam dolorum iusto sunt aperiam esse odit id.
                </p>
            </div>

            <!-- Bagian About Us -->
            {{-- tambah py-12 --}}
            <section class="bg-gray-100 py-12 px-6 rounded-2xl shadow-md">
                <div class="flex flex-col md:flex-row items-center gap-10">
                    <!-- Video / Icon -->
                    <div class="w-full md:w-1/3 lg:w-2/5">
                        <a href="#" class="block bg-green-800 rounded-2xl shadow-lg aspect-video flex items-center justify-center group">
                            <svg class="w-16 h-16 text-white transform group-hover:scale-110 transition-transform duration-300"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                            </svg>
                        </a>
                    </div>

                    <!-- Text -->
                    <div class="w-full md:w-2/3 lg:w-3/5">
                        <span class="inline-block bg-green-800 text-white text-l font-semibold px-5 py-2 rounded-full mb-4">
                            About us
                        </span>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Yayasan berprinsip Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse accumsan hendrerit neque eget vehicula. Vivamus a urna eleifend, luctus metus dignissim, gravida nisi. Fusce auctor, lectus at bibendum aliquet, nisl augue ultrices lorem, at egestas diam augue suscipit urna. Nam iaculis egestas ligula vitae malesuada.
                        </p>
                    </div>
                </div>
            </section>

            {{-- Bagian Program --}}
            <section class="mx-auto py-12">
                <!-- Title -->
                <h2 class="inline-block bg-green-800 text-white text-lg font-semibold px-6 py-3 rounded-full mb-8 shadow-md">
                    Program aktif
                </h2>

                <!-- Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Card 1 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <img src="{{ asset('images/berita.png') }}" alt="Program 1" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold mb-2">Pendaftaran lorem dibuka</h3>
                            <p class="text-gray-600 text-sm mb-4">
                                Telah dibukanya pendaftaran Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse non sapien sit amet nunc sollicitudin.
                            </p>
                            <button class="bg-gray-200 hover:bg-gray-300 text-black font-semibold px-6 py-2 rounded-lg shadow">
                                Daftar
                            </button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <img src="{{ asset('images/berita.png') }}" alt="Program 2" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold mb-2">Pendaftaran ipsum dibuka</h3>
                            <p class="text-gray-600 text-sm mb-4">
                                Telah dibukanya pendaftaran Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse non sapien sit amet nunc sollicitudin.
                            </p>
                            <button class="bg-gray-200 hover:bg-gray-300 text-black font-semibold px-6 py-2 rounded-lg shadow">
                                Daftar
                            </button>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <img src="{{ asset('images/berita.png') }}" alt="Program 3" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold mb-2">Pendaftaran dolor sit dibuka</h3>
                            <p class="text-gray-600 text-sm mb-4">
                                Telah dibukanya pendaftaran Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse non sapien sit amet nunc sollicitudin.
                            </p>
                            <button class="bg-gray-200 hover:bg-gray-300 text-black font-semibold px-6 py-2 rounded-lg shadow">
                                Daftar
                            </button>
                        </div>
                    </div>

                </div>
            </section>

            {{-- Bagian Berita --}}
            <section class="mx-auto py-12">
                <!-- Title -->
                <h2 class="inline-block bg-green-800 text-white text-lg font-semibold px-6 py-3 rounded-full mb-8 shadow-md">
                    Berita Terkini
                </h2>

                    <!-- Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                        <!-- Card 1 -->
                        @foreach ($berita_3 as $berita )
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                                <img src="{{ asset('images/artikel.png') }}" alt="Program 1" class="w-full h-48 object-cover">
                                <div class="p-4 flex flex-col flex-grow">
                                    <h3 class="text-lg font-bold mb-2">{{ $berita->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-4 text-justify">
                                        {{ Str::words(strip_tags($berita->body), 30, '...') }}
                                    </p>
                                    <a href="{{ url('yayasan/article/'.$berita->id) }}"
                                    class="mt-auto bg-gray-200 hover:bg-gray-300 text-sm text-black font-semibold px-6 py-2 rounded-lg shadow self-start">
                                        Baca Selengkapnya &raquo;
                                    </a>
                                </div>
                            </div>
                        @endforeach
            </section>

        </div>
    </div>


</body>
</html>
