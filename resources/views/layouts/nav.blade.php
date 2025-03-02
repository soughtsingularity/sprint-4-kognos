<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cursos')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

<nav class="border-b border-gray-700 bg-[var(--dark-bg)]" x-data="{ openMenu: false }">
    <div class="max-w-screen-xl mx-auto p-4 flex justify-between items-center">
        <a href="{{ route('courses.index') }}" class="text-2xl font-mono font-bold hover:text-gray-300 transition">
            Kognos
        </a>

        <button @click="openMenu = !openMenu" class="md:hidden text-white hover:text-gray-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16m-7 6h7"/>
            </svg>
        </button>

        <div class="hidden md:flex space-x-6 text-white items-center">
            <div class="relative" x-data="{ openDrop: false }">
                <button @click="openDrop = !openDrop" class="inline-flex items-center px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-lg transition">
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        Admin
                    @else
                        Katas
                    @endif
                    <svg class="w-3 h-3 ml-2" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" 
                              stroke-linejoin="round" stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div x-show="openDrop" @click.away="openDrop = false" x-transition.opacity
                     class="absolute mt-2 w-48 bg-[var(--dark-bg)] border border-gray-700 rounded-lg shadow-md z-20">
                    <ul class="py-2 text-sm text-gray-300">
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <li>
                                <a href="{{ route('users.index') }}"
                                   class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">
                                    Usuarios
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.courses.index') }}"
                                   class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">
                                    Cursos
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="https://www.codewars.com/" class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">Codewars</a>
                            </li>
                            <li>
                                <a href="https://exercism.org/" class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">Exercism</a>
                            </li>
                            <li>
                                <a href="https://leetcode.com/" class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">LeetCode</a>
                            </li>
                            <li>
                                <a href="https://sqlzoo.net/wiki/SQL_Tutorial" class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">SQLZoo</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            @if(Auth::check())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                            class="inline-flex items-center text-white bg-gray-700 px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                        Logout
                    </button>
                </form>
                @if(Auth::user()->role === 'user')
                    <a href="{{ route('user.dashboard', ['user' => Auth::user()->id]) }}"
                       class="inline-flex items-center text-white bg-gray-700 px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                       Dashboard
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}"
                   class="inline-flex items-center text-white px-4 py-2 rounded-lg hover:text-gray-300 transition">
                   Login
                </a>
                <a href="{{ route('register') }}"
                   class="inline-flex items-center text-white px-4 py-2 rounded-lg hover:text-gray-300 transition">
                   Register
                </a>
            @endif
        </div>
    </div>

    <div x-show="openMenu" @click.away="openMenu = false" x-transition.opacity 
         class="md:hidden bg-gray-900 text-white w-full px-4 py-4 border-t border-gray-700" style="position: relative;">
        
        <div class="border-b border-gray-700 pb-4 mb-4" x-data="{ openDropMobile: false }">
            <button @click="openDropMobile = !openDropMobile" 
                    class="w-full inline-flex items-center bg-gray-800 px-4 py-2 rounded-lg hover:bg-gray-700 transition justify-between">
                @if(Auth::check() && Auth::user()->role === 'admin')
                    Admin
                @else
                    Katas
                @endif
                <svg class="w-3 h-3 ml-2" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" 
                          stroke-linejoin="round" stroke-width="2"
                          d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div x-show="openDropMobile" @click.away="openDropMobile = false"
                 x-transition.opacity class="mt-2 bg-[var(--dark-bg)] border border-gray-700 rounded-lg shadow-md">
                <ul class="py-2 text-sm text-gray-300">
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <li>
                            <a href="{{ route('users.index') }}"
                               class="block px-4 py-2 hover:bg-gray-700 transition">
                               Usuarios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.courses.index') }}"
                               class="block px-4 py-2 hover:bg-gray-700 transition">
                               Cursos
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="https://www.codewars.com/" class="block px-4 py-2 hover:bg-gray-700 transition">Codewars</a>
                        </li>
                        <li>
                            <a href="https://exercism.org/" class="block px-4 py-2 hover:bg-gray-700 transition">Exercism</a>
                        </li>
                        <li>
                            <a href="https://leetcode.com/" class="block px-4 py-2 hover:bg-gray-700 transition">LeetCode</a>
                        </li>
                        <li>
                            <a href="https://sqlzoo.net/wiki/SQL_Tutorial" class="block px-4 py-2 hover:bg-gray-700 transition">SQLZoo</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="space-y-2">
            @if(Auth::check())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                            class="block w-full text-left bg-gray-700 px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                        Logout
                    </button>
                </form>

                @if(Auth::user()->role === 'user')
                    <a href="{{ route('user.dashboard', ['user' => Auth::user()->id]) }}"
                       class="block w-full text-left bg-gray-700 px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                       Dashboard
                    </a>
                @endif

            @else
                <a href="{{ route('login') }}"
                   class="block w-full text-left px-4 py-2 rounded-lg hover:text-gray-300 transition">
                   Login
                </a>
                <a href="{{ route('register') }}"
                   class="block w-full text-left px-4 py-2 rounded-lg hover:text-gray-300 transition">
                   Register
                </a>
            @endif
        </div>
    </div>
</nav>

@if(session('success'))
    <div id="success-alert" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg shadow-md fixed top-20 right-4 z-50">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div id="error-alert" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg shadow-md fixed top-20 right-4 z-50">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<main class="container mx-auto p-6">
    @yield('content')
</main>

<script>
setTimeout(() => {
    let successAlert = document.getElementById('success-alert');
    let errorAlert = document.getElementById('error-alert');

    if(successAlert) successAlert.style.display = 'none';
    if(errorAlert) errorAlert.style.display = 'none';
}, 3000);
</script>

</body>
</html>




