<nav class="bg-purple-800 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 flex-shrink-0">
                <img src="{{ asset('images/logo2.png') }}"
                alt="Logo"
                class="w-full h-full object-contain brightness-0 invert">
            </div>
            <a href="/sma" class="text-white text-2xl font-bold tracking-wider">
                SMA <span class="font-normal">Matho'liul Huda</span>
            </a>
        </div>

        <!-- Menu -->
        <ul class="flex items-center space-x-8 h-full">
            <li>
                <a href="/sma"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('sma') ? 'border-b-2 border-white' : '' }}">
                    Home
                </a>
            </li>

            <!-- Dropdown Kepengurusan -->
            <li>
                <a href="/sma/staff"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('sma/staff') ? 'border-b-2 border-white' : '' }}">
                    Kepengurusan
                </a>
            </li>

            <li>
                <a href="/sma/programs"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('sma/programs') ? 'border-b-2 border-white' : '' }}">
                    Program
                </a>
            </li>
            <li>
                <a href="/sma/galeri"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('sma/galeri') ? 'border-b-2 border-white' : '' }}">
                    Galeri
                </a>
            </li>
            <li>
                <a href="/sma/articles"
                    class="flex items-center h-full pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('sma/articles') ? 'border-b-2 border-white' : '' }}">
                    Berita
                </a>
            </li>
        </ul>

    </div>
</nav>
