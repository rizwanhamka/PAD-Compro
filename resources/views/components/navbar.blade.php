
<nav class="bg-green-800 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 flex-shrink-0">
                <img src="{{ asset('images/logo2.png') }}" alt="Logo Yayasan" class="w-full h-full object-contain">
            </div>
            <a href="/" class="text-white text-2xl font-bold tracking-wider">
                YAYASAN <span class="font-normal">Matholi'ul Huda</span>
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
