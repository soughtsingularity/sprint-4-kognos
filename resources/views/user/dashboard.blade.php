@extends('layouts.app')

@section('title', 'Mi Panel')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 text-gray-200">{{$user->name}}</h1>
    <form action="{{route('delete-account')}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded mt-4">Eliminar cuenta</button>
    </form>
    @if ($courses->isEmpty())
        <p class="text-gray-200">No estás inscrito en ningún curso aún.</p>
    @else
        <table class="table-auto w-full mt-4 border-collapse border border-gray-300">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">Curso</th>
                    <th class="px-4 py-2 border">Progreso</th>
                    <th class="px-4 py-2 border">Medalla</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="border">
                        <td class="px-4 py-2 border">{{ $course->title }}</td>
                        <td class="px-4 py-2 border">{{ $course->pivot->progress }}%</td>
                        <td class="px-4 py-2 border">
                            @if ($course->pivot->medal == 'gold')
                                <span class="text-yellow-500 font-bold">🏅 Oro</span>
                            @elseif ($course->pivot->medal == 'silver')
                                <span class="text-gray-500 font-bold">🥈 Plata</span>
                            @elseif ($course->pivot->medal == 'bronze')
                                <span class="text-orange-500 font-bold">🥉 Bronce</span>
                            @else
                                <span class="text-gray-400 font-bold">Sin Medalla</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border flex space-x-2">
                            <a href="{{ route('courses.show', $course) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Ver</a>
                            <form action="{{ route('courses.unenroll', $course) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Salir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
