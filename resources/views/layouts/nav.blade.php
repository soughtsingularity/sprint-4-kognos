<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Cursos')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@flowbite/tailwindcss@1.8.1/dist/flowbite.min.js"></script>
    <style>
        :root {
            --primary-color: #B1361E; 
            --dark-bg: #1F1F1F;
            --light-bg: #2D2D2D;
            --text-light: #F7F7F7;
            --text-dark: #C0C0C0;
        }
    </style>
</head>
<body class="bg-[var(--dark-bg)] text-[var(--text-light)]">

    <nav class="bg-[var(--dark-bg)] border-b border-gray-700">
        <div class="max-w-screen-xl flex justify-between items-center mx-auto p-4">
            
            <a href="{{ route('courses.index') }}" class="text-2xl font-mono font-bold text-white hover:text-gray-300 transition">
                Kognos
            </a>

            <div class="hidden md:flex space-x-6">

                @livewire('layouts.dropdown')

                @if(Auth::check())
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white bg-gray-700 px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                            Logout
                        </button>
                    </form>
                    @if(Auth::user()->role === 'user')

                            <a href="{{ route('user.dashboard', ['user' => Auth::user()->id]) }}" class="text-white bg-gray-600 px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                                Dashboard
                            </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-white px-4 py-2 rounded-lg hover:text-gray-300 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="text-white px-4 py-2 rounded-lg hover:text-gray-300 transition">
                        Register
                    </a>
                @endif

            </div>

            <button data-collapse-toggle="navbar-multi-level" type="button" class="md:hidden text-white hover:text-gray-300">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </button>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>

</body>
</html>
