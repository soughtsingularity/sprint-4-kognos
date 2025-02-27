@extends('layouts.app');

@section('title', 'Cursos')

@section('content')

<div class="container mx-auto p-4">
    <h1 class="tex-2xl font-bold mb-4">Cursos Disponibles</h1>
    <a href="{{route('admin.courses.create')}}" class="bg-blue-500 text-white px-4 py-2 rounded">Crear nuevo curso</a>

    <table class="table-auto w-full mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Titulo</th>
                <th class="px-4 py-2">Descripción</th>
                <th class="px-4 py-2">Acciones</th>
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
                    <td class="px-4 py-2">{{$course->description}}</td>
                    <td class="px-4 py-2">
                        @if($isAdmin)
                            <a href="{{ route('admin.courses.edit', $course) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Eliminar</button>
                            </form>
                        @else
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