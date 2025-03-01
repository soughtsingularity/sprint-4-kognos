@extends('layouts.nav')

@section('title', 'Cursos')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-white text-center mb-6 font-mono">Cursos Disponibles</h1>

    @if(Auth::check() && Auth::user()->role === 'admin')
        <div class="flex justify-center mb-6">
            <a href="{{ route('admin.courses.create') }}" class="bg-[var(--primary-color)] text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
                Crear Nuevo Curso
            </a>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($courses as $course)
            <div class="bg-gray-800 border border-gray-700 rounded-lg shadow-md p-5 text-white">
                <h2 class="text-xl font-bold mb-2 font-mono">
                    <a href="{{ route('courses.chapter', [$course, 0]) }}" class="text-[var(--primary-color)] hover:underline">
                        {{ $course->title }}
                    </a>
                </h2>
                <p class="text-gray-400 text-sm mb-4">{{ $course->description }}</p>

                <div class="flex justify-between items-center">
                    @if(Auth::check() && Auth::user()->role === 'admin')
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.courses.edit', $course) }}" 
                               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                                Editar
                            </a>
                            <a href="{{ route('courses.chapter', [$course, 0]) }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                                Ver
                            </a>
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                        Eliminar
                                </button>
                            </form>
                        </div>
                    @elseif(Auth::check())
                        @if(Auth::user()->courses->contains($course->id))
                            <form action="{{ route('courses.unenroll', $course) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                    Darse de Baja
                                </button>
                            </form>
                        @else
                            <form action="{{ route('courses.enroll', $course) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                                    Inscribirse
                                </button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
