<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite('resources/css/app.css')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700;800&display=swap');
        body { font-family: 'Manrope', sans-serif; -webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale; }
    </style>

    <title>404 • Halaman Tidak Ditemukan — Yayasan Matho'liul Huda</title>
</head>
<body class="bg-gray-50 text-gray-800">

    <main class="min-h-screen flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-4xl bg-white rounded-3xl soft-shadow p-10 md:p-14 flex flex-col md:flex-row items-center gap-10">

            <!-- Left: Illustration -->
            <div class="flex-shrink-0">
                <!-- Inline SVG illustration (always loads) -->
                <svg width="260" height="260" viewBox="0 0 320 320" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <rect x="0" y="0" width="320" height="320" rx="28" fill="#F7FDF6"/>
                    <g transform="translate(40,30)">
                        <circle cx="120" cy="50" r="42" fill="#D1FAE5"/>
                        <circle cx="110" cy="44" r="6" fill="#10B981"/>
                        <circle cx="130" cy="44" r="6" fill="#10B981"/>
                        <path d="M100 68 Q120 86 140 68" stroke="#10B981" stroke-width="4" stroke-linecap="round" fill="none"/>
                        <rect x="30" y="110" width="180" height="110" rx="14" fill="#ECFDF5"/>
                        <rect x="46" y="128" width="148" height="18" rx="6" fill="#BBF7D0"/>
                        <rect x="46" y="154" width="110" height="12" rx="6" fill="#E6FFEF"/>
                        <rect x="46" y="174" width="90" height="8" rx="6" fill="#E6FFEF"/>
                        <circle cx="200" cy="200" r="12" fill="#BBF7D0" />
                    </g>
                </svg>
            </div>

            <!-- Right: Text -->
            <div class="flex-1">
                <h1 class="text-6xl md:text-7xl font-extrabold text-green-800 leading-tight">404</h1>
                <h2 class="mt-2 text-2xl md:text-3xl font-semibold text-gray-800">Halaman Tidak Ditemukan</h2>

                <p class="mt-4 text-gray-600 max-w-xl">
                    Maaf, halaman yang kamu cari tidak ditemukan atau telah dipindahkan.
                    Periksa kembali alamat URL atau kembali ke beranda untuk melanjutkan.
                </p>

                <div class="mt-6 flex flex-col sm:flex-row items-start sm:items-center gap-3">
                    <a href="{{ url('/') }}"
                       class="inline-flex items-center justify-center bg-green-700 hover:bg-green-800 text-white font-semibold px-6 py-3 rounded-xl shadow transition">
                        Kembali ke Beranda
                    </a>

                    <a href="javascript:history.back()"
                       class="inline-flex items-center justify-center border border-gray-200 bg-white text-gray-700 px-5 py-3 rounded-xl shadow-sm hover:shadow-md transition">
                        Kembali Sebelumnya
                    </a>
                </div>

                <!-- Optional small search (helpful) -->
                <form action="{{ url('/search') }}" method="GET" class="mt-6">
                    <label for="q" class="sr-only">Cari</label>
                    <div class="flex items-center gap-2 max-w-md">
                        <input id="q" name="q" type="text" placeholder="Cari halaman atau berita..."
                               class="w-full rounded-lg border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
                        <button type="submit" class="inline-flex items-center gap-2 bg-green-100 text-green-800 px-4 py-2 rounded-lg font-semibold hover:bg-green-200">
                            Cari
                        </button>
                    </div>
                </form>

                <p class="mt-6 text-sm text-gray-400">
                    Jika masalah berlanjut, hubungi admin: <span class="text-gray-600">admin@matholiulhuda.sch.id</span>
                </p>
            </div>

        </div>
    </main>

    <style>
        /* small helpers scoped to this page */
        .soft-shadow { box-shadow: 0 12px 30px rgba(16,24,40,0.06); }
        @media (prefers-reduced-motion: no-preference) {
            main { animation: fadeUp .5s ease both; }
            @keyframes fadeUp { from { transform: translateY(6px); opacity: 0 } to { transform: translateY(0); opacity: 1 } }
        }
    </style>

</body>
</html>
