<div class="fixed top-0 left-0 h-full w-56 bg-white shadow-lg z-50 font-[Manrope] flex flex-col items-center py-6 border-r border-gray-100">

    @php
        $currentId = request()->segment(2);
    @endphp

    <div class="flex flex-col items-center mb-8">
        <div class="w-10 h-10 bg-gray-200 rounded-full mb-2 overflow-hidden">
            <img src="http://127.0.0.1:8000/images/logo2.png" alt="Logo" class="w-full h-full object-cover">
        </div>
        <span class="text-green-700 font-semibold text-sm">Matho’liul huda</span>
    </div>

    <nav class="flex flex-col gap-4 w-full px-5">

        <a href="{{ route('dashboard.index', 1) }}"
           class="block w-full font-semibold py-2.5 rounded-md text-center transition duration-200 ease-in-out border
           {{ $currentId == 1
               ? 'bg-green-800 text-white shadow-md border-green-800 transform scale-105'
               : 'bg-white text-green-700 border-green-200 hover:bg-green-50 hover:border-green-600'
           }}">
           Yayasan
        </a>

        <a href="{{ route('dashboard.index', 2) }}"
           class="block w-full font-semibold py-2.5 rounded-md text-center transition duration-200 ease-in-out border
           {{ $currentId == 2
               ? 'bg-red-800 text-white shadow-md border-red-800 transform scale-105'
               : 'bg-white text-red-700 border-red-200 hover:bg-red-50 hover:border-red-600'
           }}">
           TK
        </a>

        <a href="{{ route('dashboard.index', 3) }}"
           class="block w-full font-semibold py-2.5 rounded-md text-center transition duration-200 ease-in-out border
           {{ $currentId == 3
               ? 'bg-amber-500 text-white shadow-md border-amber-500 transform scale-105'
               : 'bg-white text-amber-600 border-amber-200 hover:bg-amber-50 hover:border-amber-500'
           }}">
           SD
        </a>

        <a href="{{ route('dashboard.index', 4) }}"
           class="block w-full font-semibold py-2.5 rounded-md text-center transition duration-200 ease-in-out border
           {{ $currentId == 4
               ? 'bg-sky-600 text-white shadow-md border-sky-600 transform scale-105'
               : 'bg-white text-sky-600 border-sky-200 hover:bg-sky-50 hover:border-sky-500'
           }}">
           SMP
        </a>

        <a href="{{ route('dashboard.index', 5) }}"
           class="block w-full font-semibold py-2.5 rounded-md text-center transition duration-200 ease-in-out border
           {{ $currentId == 5
               ? 'bg-indigo-900 text-white shadow-md border-indigo-900 transform scale-105'
               : 'bg-white text-indigo-900 border-indigo-200 hover:bg-indigo-50 hover:border-indigo-800'
           }}">
           SMA
        </a>

    </nav>
</div>
