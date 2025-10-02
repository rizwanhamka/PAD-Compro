<nav class="bg-green-800 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <div>
            <a href="#" class="text-white text-2xl font-bold tracking-wider">
                YAYASAN <span class="font-normal">Matho'liul Huda</span>
            </a>
        </div>

        <ul class="flex items-center space-x-8">
            <li>
                <a href="/"
                    class="pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('/') ? 'border-b-2 border-white' : '' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="#"
                    class="pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('organisasi') ? 'border-b-2 border-white' : '' }}">
                    Organisasi
                </a>
            </li>
            <li>
                <a href="/yayasan/programs"
                    class="pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('yayasan/programs') ? 'border-b-2 border-white' : '' }}">
                    Program
                </a>
            </li>
            <li>
                <a href="#"
                    class="pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('gallery') ? 'border-b-2 border-white' : '' }}">
                    Gallery
                </a>
            </li>
            <li>
                <a href="/yayasan/articles"
                    class="pb-1 text-white hover:text-gray-300 transition-colors duration-300 {{ request()->is('yayasan/articles') ? 'border-b-2 border-white' : '' }}">
                    Berita
                </a>
            </li>
        </ul>

    </div>
</nav>
