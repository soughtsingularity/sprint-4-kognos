<div class="relative inline-block" x-data="{ open: false }">
    <!-- Botón de Dropdown -->
    <button @click="open = !open" 
            class="flex items-center justify-between w-full py-2 px-4 text-white bg-gray-800 rounded-lg hover:bg-gray-700 transition">
        <span class="font-mono">
            {{ Auth::check() && Auth::user()->role === 'admin' ? 'Admin' : 'Katas' }}
        </span>
        <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>

    <!-- Contenedor del menú -->
    <div x-show="open" @click.away="open = false" x-transition.opacity 
         class="absolute z-10 mt-2 w-48 bg-[var(--dark-bg)] border border-gray-700 rounded-lg shadow-md">
        <ul class="py-2 text-sm text-gray-300">
            @if(Auth::check() && Auth::user()->role === 'admin')
                <li>
                    <a href="{{ route('users.index') }}" 
                       class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">
                        Usuarios
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.courses.index')}}" 
                       class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">
                        Cursos
                    </a>
                </li>
            @else
                <li>
                    <a href="https://www.codewars.com/" class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">
                        Codewars
                    </a>
                </li>
                <li>
                    <a href="https://exercism.org/" class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">
                        Exercism
                    </a>
                </li>
                <li>
                    <a href="https://leetcode.com/" class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">
                        LeetCode
                    </a>
                </li>
                <li>
                    <a href="https://sqlzoo.net/wiki/SQL_Tutorial" class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition">
                        SQLZoo
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>




