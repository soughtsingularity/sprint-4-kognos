@extends('layouts.nav')

@section('title', 'Mi Panel')

@section('content')

<div class="max-w-3xl mx-auto bg-gray-800 border border-gray-700 rounded-lg shadow-lg p-6 text-white">

    @if(Auth::check() && Auth::user()->id === $user->id)
        <h1 class="text-3xl font-bold text-center font-mono mb-6">
            Bienvenido, {{ $user->name }}
        </h1>
        
        @if ($courses->isEmpty())
            <p class="text-gray-400 font-semibold text-center">No estás inscrito en ningún curso aún.</p>
            <div class="flex justify-center mt-6">
                <a href="{{ route('courses.index') }}" class="bg-[var(--primary-color)] text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
                    Buscar Cursos
                </a>
            </div>
        @else
            <h2 class="text-xl font-bold mb-4">Mis Cursos</h2>
        @endif

    @else
        <h1 class="text-3xl font-bold text-center font-mono mb-6">
            Panel de {{ $user->name }}
        </h1>
    @endif

    @if(!$courses->isEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($courses as $course)
                <div class="bg-gray-700 border border-gray-600 rounded-lg p-4">
                    <h3 class="text-lg font-bold text-[var(--primary-color)]">{{ $course->title }}</h3>

                    <div class="mt-2">
                        <p class="text-gray-300">Progreso: <strong>{{ $course->pivot->progress }}%</strong></p>
                        <div class="w-full bg-gray-600 rounded-full h-3">
                            <div class="bg-[var(--primary-color)] h-3 rounded-full transition-all" style="width: {{ $course->pivot->progress }}%"></div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <p class="text-gray-300">Medalla:</p>
                        @if ($course->pivot->medal == 'gold')
                            <span class="text-yellow-500 font-bold">🏅 Oro</span>
                        @elseif ($course->pivot->medal == 'silver')
                            <span class="text-gray-400 font-bold">🥈 Plata</span>
                        @elseif ($course->pivot->medal == 'bronze')
                            <span class="text-orange-500 font-bold">🥉 Bronce</span>
                        @else
                            <span class="text-gray-500 font-bold">Sin Medalla</span>
                        @endif
                    </div>

                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('courses.chapter', [$course, 0]) }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                            Ver
                        </a>
                        
                        @if(Auth::user()->id === $user->id)
                            <form action="{{ route('courses.unenroll', $course) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                    Abandonar Curso
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="mt-6 flex justify-center">
        <a href="{{ route('users.edit', $user) }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
            Editar Cuenta
        </a>
    </div>

</div>

@endsection


