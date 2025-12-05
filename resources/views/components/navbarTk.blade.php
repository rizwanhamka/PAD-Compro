<nav class="bg-red-800 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 flex-shrink-0">
                <img src="{{ asset('images/logo2.png') }}"
                alt="Logo"
                class="w-full h-full object-contain brightness-0 invert">
            </div>
            <a href="/tk" class="text-white text-2xl font-bold tracking-wider">
                TK <span class="font-normal">Matho'liul Huda</span>
            </a>
        </div>

        <!-- Menu -->
        <ul class="flex items-center space-x-8 h-full">
            <li>
                <a href="/tk"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('tk') ? 'border-b-2 border-white' : '' }}">
                    Home
                </a>
            </li>

            <!-- Dropdown Kepengurusan -->
            <li>
                <a href="/tk/staff"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('tk/staff') ? 'border-b-2 border-white' : '' }}">
                    Kepengurusan
                </a>
            </li>

            <li>
                <a href="/tk/programs"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('tk/programs') ? 'border-b-2 border-white' : '' }}">
                    Program
                </a>
            </li>
            <li>
                <a href="/tk/galeri"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('tk/galeri') ? 'border-b-2 border-white' : '' }}">
                    Galeri
                </a>
            </li>
            <li>
                <a href="/tk/articles"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('tk/articles') ? 'border-b-2 border-white' : '' }}">
                    Berita
                </a>
            </li>
        </ul>

    </div>
</nav>
