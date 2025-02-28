<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Cursos')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@flowbite/tailwindcss@1.8.1/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

          <div class="flex justify-start">
                <a href="{{ route('courses.index') }}" class="text-2xl font-semibold whitespace-nowrap dark:text-white">
                    Kognos
                </a>
                @if(Auth::check())
                  @if(Auth::user()->role === 'admin')                
                    <a href="{{ route('admin.courses.create') }}" class="text-white font-semibold mx-6 px-4 py-2">Crear nuevo curso</a>
                  @endif
                @endif
              </div>


            <button data-collapse-toggle="navbar-multi-level" type="button" 
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg 
                md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 
                dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" 
                aria-controls="navbar-multi-level" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg 
                    bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 
                    md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    
                    @livewire('layouts.dropdown')

                    @if(Auth::check())
                        @if(Auth::user()->role === 'user' && Auth::user()->courses->isNotEmpty())
                            <li>
                                <a href="{{ route('user.dashboard') }}" class="block py-2 px-3 text-white bg-blue-700 rounded-sm 
                                    md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 
                                    dark:bg-blue-600 md:dark:bg-transparent">
                                    Mis cursos
                                </a>
                            </li>
                        @endif
                        <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block py-2 px-3 text-white bg-blue-700 rounded-sm 
                                md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 
                                dark:bg-blue-600 md:dark:bg-transparent">
                                Logout
                            </button>
                        </form>
                    </li>
                    <li>
                        <form action="{{route('delete-account')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="block py-2 px-3 text-white bg-blue-700 rounded-sm 
                                md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 
                                dark:bg-blue-600 md:dark:bg-transparent">
                                Eliminar cuenta
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="block py-2 px-3 text-white bg-blue-700 rounded-sm 
                            md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 
                            dark:bg-blue-600 md:dark:bg-transparent">
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="block py-2 px-3 text-white bg-blue-700 rounded-sm 
                            md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 
                            dark:bg-blue-600 md:dark:bg-transparent">
                            Register
                        </a>
                    </li>
                @endif
                
                </ul>
            </div>
        </div>
    </nav>
    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>
