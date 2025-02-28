@extends('layouts.nav')

@section('title', 'Gestión de usuarios para administradores')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Usuarios registrados</h1>

    <a href="{{route('admin.users.create')}}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Crear nuevo usuario</a>

    <table class="tabe-auto w-full mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Rol</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @if($user->role === 'user') 
                    <tr class="border">
                        <td class="px-4 py-2">{{$user->name}}</td>
                        <td class="px-4 py-2">{{$user->email}}</td>
                        <td class="px-4 py-2">{{ ucfirst($user->role) }}</td>
                        <td class="px-4 py-2 border flex space-x-2">
                            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
        
                    @if(!$user->courses->isEmpty())
                        <tr>
                            <td colspan="4" class="px-4 py-2 bg-gray-100">
                                <h3 class="font-semibold">Cursos inscritos:</h3>
                                <ul class="list-disc ml-4">
                                    @foreach($user->courses as $course)
                                        <li>
                                            {{ $course->title }} - 
                                            <span class="text-sm text-gray-600">
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