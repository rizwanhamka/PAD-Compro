@php
    // ambil segment pertama (null/'' untuk root)
    $seg = request()->segment(1) ?? '';
@endphp

<footer class="
    @if($seg === '' || $seg === null) bg-green-900
    @elseif($seg === 'tk') bg-red-900
    @elseif($seg === 'sd') bg-yellow-900
    @elseif($seg === 'smp') bg-blue-900
    @elseif($seg === 'sma') bg-purple-900
    @else bg-green-900
    @endif
    text-white py-12 px-6
">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 text-sm">

        <!-- Logo + Alamat -->
        <div class="flex flex-col items-center text-center">
            <div class="w-40 h-40 mb-6 flex items-center justify-center
                @if($seg === '' || $seg === null) bg-green-800/50
                @elseif($seg === 'tk') bg-red-800/50
                @elseif($seg === 'sd') bg-yellow-800/50
                @elseif($seg === 'smp') bg-blue-800/50
                @elseif($seg === 'sma') bg-purple-800/50
                @else bg-green-800/50
                @endif
                rounded-full">
                <img src="{{ asset('images/logo2.png') }}"
                alt="Logo"
                class="w-full h-full object-contain brightness-0 invert">
            </div>

            <div class="flex items-center gap-3 justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                <span>Jl. Matholiul Huda dolor sit amet no.45</span>
            </div>
        </div>

        <!-- Sekolah -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Organisasi</h3>
            <ul class="space-y-3">

                <!-- YAYASAN (/ ) -->
                <li>
                    <a href="{{ url('/') }}"
                    class="flex items-center gap-2
                    {{ request()->is('/') ? 'text-yellow-300 font-semibold' : 'text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Yayasan Matholiul Huda</span>
                    </a>
                </li>

                <!-- TK (/tk) -->
                <li>
                    <a href="{{ url('/tk') }}"
                    class="flex items-center gap-2
                    {{ request()->is('tk') ? 'text-yellow-300 font-semibold' : 'text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>TK Matholiul Huda</span>
                    </a>
                </li>

                <!-- SD (/sd) -->
                <li>
                    <a href="{{ url('/sd') }}"
                    class="flex items-center gap-2
                    {{ request()->is('sd') ? 'text-yellow-300 font-semibold' : 'text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>SD Matholiul Huda</span>
                    </a>
                </li>

                <!-- SMP (/smp) -->
                <li>
                    <a href="{{ url('/smp') }}"
                    class="flex items-center gap-2
                    {{ request()->is('smp') ? 'text-yellow-300 font-semibold' : 'text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>SMP Matholiul Huda</span>
                    </a>
                </li>

                <!-- SMA (/sma) -->
                <li>
                    <a href="{{ url('/sma') }}"
                    class="flex items-center gap-2
                    {{ request()->is('sma') ? 'text-yellow-300 font-semibold' : 'text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>SMA Matholiul Huda</span>
                    </a>
                </li>

            </ul>
        </div>

        <!-- Kontak -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Contact info</h3>
            <ul class="space-y-3">
                <li class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                    </svg>
                    <span>+62 899-5654-8975</span>
                </li>
                <li class="flex items-center gap-3">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                    </svg>
                    <span>+62 899-5654-8975</span>
                </li>
                <li class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                      <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                    <span>Lorem.ipsum@gmail.com</span>
                </li>
            </ul>
        </div>

    </div>
</footer>
