<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600;700&display=swap');
        body {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-900 font-sans flex flex-col min-h-screen">
    {{-- <x-sidebar /> --}}
    <main class="flex-grow flex items-center justify-center px-6">
        <div class="w-full max-w-md">
            <p class="text-green-700 font-semibold mb-2">Matho’liul Huda</p>
            <h1 class="text-2xl font-bold mb-10">Admin Login</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                    {{ $errors->first('name') }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-8">
                @csrf
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm text-gray-500 mb-1">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Name"
                        class="w-full py-2 bg-transparent border-0 border-b border-gray-400 focus:outline-none focus:border-gray-700"
                        value="{{ old('name') }}"
                    >
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm text-gray-500 mb-1">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password"
                        class="w-full py-2 bg-transparent border-0 border-b border-gray-400 focus:outline-none focus:border-gray-700"
                    >
                </div>

                <!-- Button -->
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-gray-200 text-gray-800 font-semibold py-2 px-6 rounded hover:bg-gray-300 transition focus:outline-none focus:ring-2 focus:ring-gray-400"
                    >
                        Login
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
