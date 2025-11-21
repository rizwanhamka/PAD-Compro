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
        .text-shadow-soft {
            text-shadow: 0px 2px 8px rgba(0, 0, 0, 0.6);
        }
    </style>
    <title>Tk Matho’liul Huda</title>
</head>
<body class="font-manrope">

    <x-navbarTk />

    <!-- Carousel coek -->
    <div class="relative w-full h-screen overflow-hidden">
        <!-- Carousel wrapper -->
        <div id="carousel" class="absolute inset-0 flex transition-transform duration-1000">
            <img src="{{ asset('images/carousel1.jpg') }}" class="w-full h-screen object-cover flex-shrink-0" alt="Slide 1">
            <img src="{{ asset('images/carousel2.jpg') }}" class="w-full h-screen object-cover flex-shrink-0" alt="Slide 2">
            <img src="{{ asset('images/carousel3.jpg') }}" class="w-full h-screen object-cover flex-shrink-0" alt="Slide 3">
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/30"></div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full px-10 text-center text-white text-shadow-soft">
            <h1 class="text-5xl font-bold mb-6">Matho’liul Huda</h1>
            <p class="max-w-3xl leading-relaxed text-lg">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores necessitatibus, eveniet dolorem laborum incidunt sed recusandae consequatur sapiente nisi itaque quo magni dolore corporis a vel animi amet sit placeat voluptatibus fugit facilis hic est eaque nesciunt. Consectetur, aliquam perspiciatis.
            </p>
        </div>

    </div>

    <div class="flex justify-center items-center bg-gray-50">
        <div class="w-4/5 flex flex-col items-center">

            <!-- Bagian About Us -->
            <section class="bg-gray-100 py-12 px-6 rounded-2xl shadow-md mt-12">
                <div class="flex flex-col md:flex-row items-center gap-10">
                    <!-- Video / Icon -->
                    <div class="w-full md:w-1/3 lg:w-2/5">
                        <div class="relative aspect-video rounded-2xl overflow-hidden shadow-lg group cursor-pointer" id="video-container">
                            <!-- Thumbnail -->
                            <img src="https://img.youtube.com/vi/yGNWylAunPc/hqdefault.jpg"
                                alt="YouTube Thumbnail"
                                class="w-full h-full object-cover">

                            <!-- Overlay Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center bg-black/30">
                                <svg class="w-16 h-16 text-white transform group-hover:scale-110 transition-transform duration-300"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Text -->
                    <div class="w-full md:w-2/3 lg:w-3/5">
                        <span class="inline-block bg-red-800 text-white text-l font-semibold px-5 py-2 rounded-full mb-4">
                            About us
                        </span>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            Tk berprinsip Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse accumsan hendrerit neque eget vehicula. Vivamus a urna eleifend, luctus metus dignissim, gravida nisi. Fusce auctor, lectus at bibendum aliquet, nisl augue ultrices lorem, at egestas diam augue suscipit urna. Nam iaculis egestas ligula vitae malesuada.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Bagian Program -->
            <section class="mx-auto py-12">
                <h2 class="inline-block bg-red-800 text-white text-lg font-semibold px-6 py-3 rounded-full mb-8 shadow-md">
                    Program aktif
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($program_3 as $berita )
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                            <img src="{{ asset('storage/' . $berita->image) }}" alt="Program 1" class="w-full h-48 object-cover">
                            <div class="p-4 flex flex-col flex-grow">
                                <h3 class="text-lg font-bold mb-2">{{ $berita->name }}</h3>
                                <p class="text-gray-600 text-sm mb-4 text-justify">
                                    {{ Str::words(strip_tags($berita->description), 30, '...') }}
                                </p>
                                <a href="{{ url('yayasan/article/'.$berita->id) }}"
                                   class="mt-auto bg-gray-200 hover:bg-gray-300 text-sm text-black font-semibold px-6 py-2 rounded-lg shadow self-start">
                                    Baca Selengkapnya &raquo;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- Bagian Berita -->
            <section class="mx-auto py-12">
                <h2 class="inline-block bg-red-800 text-white text-lg font-semibold px-6 py-3 rounded-full mb-8 shadow-md">
                    Berita Terkini
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($berita_3 as $berita )
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                            <img src="{{ asset('storage/' . $berita->image) }}" alt="Program 1" class="w-full h-48 object-cover">
                            <div class="p-4 flex flex-col flex-grow">
                                <h3 class="text-lg font-bold mb-2">{{ $berita->title }}</h3>
                                <p class="text-gray-600 text-sm mb-4 text-justify">
                                    {{ Str::words(strip_tags($berita->body), 30, '...') }}
                                </p>
                                <a href="{{ url('tk/article/'.$berita->id) }}"
                                   class="mt-auto bg-gray-200 hover:bg-gray-300 text-sm text-black font-semibold px-6 py-2 rounded-lg shadow self-start">
                                    Baca Selengkapnya &raquo;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

    <x-footer />

    <script>
        const carousel = document.getElementById('carousel');
        let index = 0;

        function showNextSlide() {
            index++;
            if (index >= carousel.children.length) {
                index = 0;
            }
            carousel.style.transform = `translateX(-${index * 100}%)`;
        }

        setInterval(showNextSlide, 4000); // ganti slide tiap 4 detik

        document.getElementById('video-container').addEventListener('click', function() {
            this.innerHTML = `
                <iframe class="w-full h-full"
                        src="https://www.youtube.com/embed/yGNWylAunPc?autoplay=1"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>`;
        });
    </script>
</body>
</html>
