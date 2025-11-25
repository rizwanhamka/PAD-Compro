<nav class="bg-green-800 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 flex-shrink-0">
                <img src="{{ asset('images/logo2.png') }}" alt="Logo Yayasan" class="w-full h-full object-contain">
            </div>
            <a href="/" class="text-white text-2xl font-bold tracking-wider">
                YAYASAN <span class="font-normal">Matho'liul Huda</span>
            </a>
        </div>

        <!-- Menu -->
        <ul class="flex items-center space-x-8 h-full">
            <li>
                <a href="/"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('/') ? 'border-b-2 border-white' : '' }}">
                    Home
                </a>
            </li>

            <li>
                <a href="/yayasan/staff"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('yayasan/staff') ? 'border-b-2 border-white' : '' }}">
                    Kepengurusan
                </a>
            </li>

            <!-- Dropdown Kepengurusan -->
            {{-- <li class="relative group">
                <a href="#"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('kepengurusan*') ? 'border-b-2 border-white' : '' }}">
                    Kepengurusan
                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <ul
                    class="absolute left-0 mt-2 w-56 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                    <li>
                        <a href="/yayasan/staff"
                            class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-700 transition">
                            Staff Organisasi
                        </a>
                    </li>
                    <li>
                        <a href="/yayasan/struktur"
                            class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-700 transition">
                            Struktur Organisasi
                        </a>
                    </li>
                </ul>
            </li> --}}

            <li>
                <a href="/yayasan/programs"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('yayasan/programs') ? 'border-b-2 border-white' : '' }}">
                    Program
                </a>
            </li>
            <li>
                <a href="/yayasan/galeri"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('yayasan/galeri') ? 'border-b-2 border-white' : '' }}">
                    Galeri
                </a>
            </li>
            <li>
                <a href="/yayasan/articles"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('yayasan/articles') ? 'border-b-2 border-white' : '' }}">
                    Berita
                </a>
            </li>
        </ul>

    </div>
</nav>
