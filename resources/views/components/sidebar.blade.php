<div
    class="fixed top-0 left-0 h-full w-56 bg-white shadow-lg z-50 font-[Manrope] flex flex-col items-center py-6 border-r border-gray-100"
>
    <!-- Logo + Title -->
    <div class="flex flex-col items-center mb-8">
        <div class="w-10 h-10 bg-gray-200 rounded-full mb-2">
            <img src="http://127.0.0.1:8000/images/logo2.png" alt=""></div> {{-- Logo placeholder --}}
        <span class="text-green-700 font-semibold text-sm">Matho’liul huda</span>
    </div>

    <!-- Menu Buttons -->
    <nav class="flex flex-col gap-4 w-full px-5">
        <a href="{{ route('dashboard.index', 1) }}" class="block w-full bg-green-800 text-white font-semibold py-2.5 rounded-md text-center hover:bg-green-900 transition">Yayasan</a>

        <a href="{{ route('dashboard.index', 2) }}" class="block w-full bg-red-800 text-white font-semibold py-2.5 rounded-md text-center hover:bg-red-900 transition">TK</a>

        <a href="{{ route('dashboard.index', 3) }}" class="block w-full bg-amber-500 text-white font-semibold py-2.5 rounded-md text-center hover:bg-amber-600 transition">SD</a>

        <a href="{{ route('dashboard.index', 4) }}" class="block w-full bg-sky-600 text-white font-semibold py-2.5 rounded-md text-center hover:bg-sky-700 transition">SMP</a>

        <a href="{{ route('dashboard.index', 5) }}" class="block w-full bg-indigo-900 text-white font-semibold py-2.5 rounded-md text-center hover:bg-indigo-950 transition">SMA</a>

    </nav>
</div>
