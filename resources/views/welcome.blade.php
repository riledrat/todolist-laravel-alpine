<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to ToDo App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
</head>
<body class="bg-gray-100 dark bg-gray-900 antialiased font-sans">
    <div class="min-h-screen flex flex-col justify-center items-center py-6 sm:py-12">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 max-w-md w-full text-center">
            <!-- Logo Component -->
            <div class="mb-6 flex justify-center">
                <x-application-logo class="h-12 mx-auto" />
            </div>
            <h1 class="text-3xl font-semibold text-gray-800 dark:text-white mb-2">Welcome to Younify ToDo App!</h1>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Organize your tasks efficiently and collaborate with others.</p>
            <div class="mb-4">
                <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-500 transition duration-200">
                    Login
                </a>
                <a href="{{ route('register') }}" class="inline-block ml-2 bg-gray-300 text-gray-800 rounded-md px-4 py-2 hover:bg-gray-200 transition duration-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                    Register
                </a>
            </div>
        </div>
        <footer class="mt-8 text-gray-600 dark:text-gray-400 text-sm">
            <p>&copy; {{ date('Y') }} Younify D.O.O. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
