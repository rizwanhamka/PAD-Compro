<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Matho’liul Huda</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700&display=swap');
        body { font-family: 'Manrope', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex">

    {{-- Sidebar --}}
    <x-sidebar />

    {{-- Konten utama --}}
    <main class="flex-1 ml-56 p-10">

        {{-- BAGIAN 1: HEADER --}}
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Dashboard Admin</h1>
                <p class="text-gray-500 text-sm mt-1">Selamat datang, berikut adalah ringkasan data sistem.</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-white border border-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-50 shadow-sm transition">
                    Logout
                </button>
            </form>
        </div>

        {{-- BAGIAN 2: STATISTIK & GRAFIK --}}
        <div class="space-y-6 mb-10">

            {{-- A. Kartu Statistik Ringkas --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Card Berita --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Berita</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ $contents->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl">📰</div>
                </div>
                {{-- Card Program --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Program</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ $programs->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl">📘</div>
                </div>
                {{-- Card Staff --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Staff</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ $staffs->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center text-xl">🏛️</div>
                </div>
            </div>

            {{-- B. Grafik Visualisasi --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- GRAFIK 1: PERBANDINGAN JUMLAH (BAR CHART) --}}
                {{-- Menggantikan grafik waktu yang error --}}
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h4 class="text-lg font-bold text-gray-800 mb-4">Volume Data</h4>
                    {{-- Container Chart --}}
                    <div id="chart-bar"></div>
                </div>

                {{-- GRAFIK 2: PROPORSI (POLAR AREA) --}}
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h4 class="text-lg font-bold text-gray-800 mb-4">Komposisi</h4>
                    {{-- Container Chart --}}
                    <div id="chart-polar" class="flex justify-center"></div>
                </div>

            </div>
        </div>
        <h3 class="text-lg font-bold text-gray-700 mb-4">Menu Manajemen</h3>
        {{-- BAGIAN 3: MENU MANAJEMEN --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
            {{-- Manajemen Berita --}}
            <a href="{{ route('dashboard.berita.index', $site) }}"
                class="bg-white shadow-md rounded-xl p-6 border border-gray-100 hover:shadow-lg transition group">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-green-100 text-green-700 flex items-center justify-center rounded-full text-xl font-bold">📰</div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-green-700">Manajemen Berita</h2>
                </div>
                <p class="text-sm text-gray-500">Kelola berita untuk setiap unit (Yayasan, TK, SD, SMP, SMA).</p>
            </a>

            {{-- Manajemen Galeri --}}
            <a href="{{ route('dashboard.galeri.index', $site) }}"
                class="bg-white shadow-md rounded-xl p-6 border border-gray-100 hover:shadow-lg transition group">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-blue-100 text-blue-700 flex items-center justify-center rounded-full text-xl font-bold">🖼️</div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-blue-700">Manajemen Galeri</h2>
                </div>
                <p class="text-sm text-gray-500">Kelola foto & dokumentasi kegiatan yayasan.</p>
            </a>
            {{-- Manajemen Program --}}
            <a href="{{ route('dashboard.program.index', $site) }}"
                class="bg-white shadow-md rounded-xl p-6 border border-gray-100 hover:shadow-lg transition group">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-700 flex items-center justify-center rounded-full text-xl font-bold">📘</div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-emerald-700">Manajemen Program</h2>
                </div>
                <p class="text-sm text-gray-500">Kelola daftar program yayasan beserta deskripsi dan link pendaftaran.</p>
            </a>

            {{-- Manajemen Staff--}}
            <a href="{{ route('dashboard.staff.index', $site) }}"
                class="bg-white shadow-md rounded-xl p-6 border border-gray-100 hover:shadow-lg transition group">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-12 h-12 bg-amber-100 text-amber-700 flex items-center justify-center rounded-full text-xl font-bold">
                        🏛️
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-amber-700">
                        Manajemen Staff
                    </h2>
                </div>
                <p class="text-sm text-gray-500">
                    Kelola struktur organisasi lembaga, data anggota, dan tautan media sosial mereka.
                </p>
            </a>

            {{-- Manajemen Profile --}}
            <a href="{{ route('dashboard.profile.index', $site) }}"
                class="bg-white shadow-md rounded-xl p-6 border border-gray-100 hover:shadow-lg transition group">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-12 h-12 bg-blue-100 text-blue-700 flex items-center justify-center rounded-full text-xl font-bold">
                        👤
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-blue-700">
                        Manajemen Profil
                    </h2>
                </div>
                <p class="text-sm text-gray-500">
                    Atur informasi profil situs seperti nama lembaga, alamat, deskripsi, logo, dan kontak resmi.
                </p>
            </a>


        </div>
    </main>

    {{-- SCRIPT KONFIGURASI CHART --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Siapkan Data Langsung dari PHP (Blade)
            const totalBerita = {{ $contents->count() }};
            const totalProgram = {{ $programs->count() }};
            const totalStaff = {{ $staffs->count() }};

            // 1. CHART BAR (Untuk Membandingkan Jumlah)
            // Ini aman karena tidak butuh data tanggal, hanya total angka.
            var optionsBar = {
                series: [{
                    name: 'Total Data',
                    data: [totalBerita, totalProgram, totalStaff]
                }],
                chart: {
                    type: 'bar',
                    height: 320,
                    toolbar: { show: false },
                    fontFamily: 'Manrope, sans-serif'
                },
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                        columnWidth: '45%',
                        distributed: true, // Agar warnanya beda-beda tiap bar
                    }
                },
                colors: ['#10B981', '#3B82F6', '#F59E0B'], // Hijau, Biru, Kuning
                dataLabels: { enabled: false },
                xaxis: {
                    categories: ['Berita', 'Program', 'Staff'],
                    labels: {
                        style: { fontSize: '14px', fontWeight: 600 }
                    },
                    axisBorder: { show: false },
                    axisTicks: { show: false }
                },
                grid: {
                    borderColor: '#f3f4f6',
                    strokeDashArray: 4
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " Data"
                        }
                    }
                },
                legend: { show: false } // Legend disembunyikan karena label sudah ada di bawah
            };

            var chartBar = new ApexCharts(document.querySelector("#chart-bar"), optionsBar);
            chartBar.render();


            // 2. CHART POLAR AREA (Untuk Melihat Komposisi)
            // Tampilan alternatif dari Pie Chart, terlihat lebih modern
            var optionsPolar = {
                series: [totalBerita, totalProgram, totalStaff],
                chart: {
                    type: 'polarArea',
                    height: 320,
                    fontFamily: 'Manrope, sans-serif'
                },
                labels: ['Berita', 'Program', 'Staff'],
                colors: ['#10B981', '#3B82F6', '#F59E0B'],
                fill: {
                    opacity: 0.8
                },
                stroke: {
                    colors: ['#fff']
                },
                yaxis: {
                    show: false
                },
                legend: {
                    position: 'bottom',
                    fontSize: '14px'
                },
                plotOptions: {
                    polarArea: {
                        rings: {
                            strokeWidth: 0
                        },
                        spokes: {
                            strokeWidth: 0
                        },
                    }
                }
            };

            var chartPolar = new ApexCharts(document.querySelector("#chart-polar"), optionsPolar);
            chartPolar.render();
        });
    </script>
</body>
</html>
