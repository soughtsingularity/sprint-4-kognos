@extends('layouts.nav')

@section('title', 'Gestión de Usuarios')

@section('content')

<div class="max-w-4xl mx-auto bg-gray-800 border border-gray-700 rounded-lg shadow-lg p-6 text-white">
    <h1 class="text-3xl font-bold text-center font-mono mb-6">Usuarios Registrados</h1>

    <div class="flex justify-center mb-6">
        <a href="{{route('users.create')}}" class="bg-[var(--primary-color)] text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
            Crear Nuevo Usuario
        </a>
    </div>

    <table class="table-auto w-full border-collapse border border-gray-700">
        <thead class="text-xs uppercase bg-gray-700 text-gray-300">
            <tr>
                <th class="px-4 py-3 border border-gray-600">Nombre</th>
                <th class="px-4 py-3 border border-gray-600">Email</th>
                <th class="px-4 py-3 border border-gray-600">Rol</th>
                <th class="px-4 py-3 border border-gray-600">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @if($user->role === 'user') 
                    <tr class="border-b border-gray-600 hover:bg-gray-700 transition">
                        <td class="px-4 py-3 border border-gray-600"><a href="{{ route('user.dashboard', ['user' => $user->id]) }}">{{ $user->name }}</a></td>
                        <td class="px-4 py-3 border border-gray-600">{{ $user->email }}</td>
                        <td class="px-4 py-3 border border-gray-600">{{ ucfirst($user->role) }}</td>
                        <td class="px-4 py-3 border border-gray-600 flex space-x-2">
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="bg-gray-500 text-white px-3 py-1 rounded-lg hover:bg-gray-600 transition">
                                Editar
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-[var(--primary-color)] text-white px-3 py-1 rounded-lg hover:bg-red-700 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                    @if(!$user->courses->isEmpty())
                        <tr class="bg-gray-700">
                            <td colspan="4" class="px-4 py-3 border border-gray-600">
                                <h3 class="font-semibold text-[var(--primary-color)]">Cursos inscritos:</h3>
                                <ul class="list-disc ml-6 text-gray-300">
                                    @foreach($user->courses as $course)
                                        <li>
                                            {{ $course->title }} - 
                                            <span class="text-sm text-gray-400">
                                                Progreso: {{ $course->pivot->progress }}% | Medalla: {{ ucfirst($course->pivot->medal) }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </tbody>        
    </table>
</div>

@endsection
