@extends('layouts.nav')

@section('title', 'Cursos')

@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Cursos Disponibles</h1>

    @if(Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ route('admin.courses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Crear nuevo curso</a>
    @endif

    <table class="table-auto w-full mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Título</th>
                <th class="px-4 py-2">Descripción</th>
                @if(Auth::check())
                <th class="px-4 py-2">Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr class="border">
                    <td class="px-4 py-2">
                        <a href="{{ route('courses.chapter', [$course, 0]) }}" class="text-blue-600 hover:underline">
                            {{ $course->title }}
                        </a>
                    </td>             
                    <td class="px-4 py-2">{{ $course->description }}</td>
                    <td class="px-4 py-2 border flex space-x-2">
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <a href="{{ route('admin.courses.edit', $course) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Eliminar</button>
                            </form>
                        @elseif(Auth::check())
                            @if(Auth::user()->courses->contains($course->id))
                                <form action="{{ route('courses.unenroll', $course) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Darse de baja</button>
                                </form>
                            @else
                                <form action="{{ route('courses.enroll', $course) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Inscribirse</button>
                                </form>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
