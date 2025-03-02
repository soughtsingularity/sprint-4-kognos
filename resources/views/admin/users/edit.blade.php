@extends('layouts.nav')

@section('title', 'Editar Usuario')

@section('content')

<div class="max-w-2xl mx-auto bg-gray-800 border border-gray-700 rounded-lg shadow-lg p-6 text-white">
    <h1 class="text-3xl font-bold text-center font-mono mb-6">
        Editar Usuario
    </h1>

    <form method="POST" action="{{route('users.update', $user)}}" class="space-y-4">
        @csrf
        @method('PATCH')

        <div>
            <label for="name" class="block text-sm font-medium mb-1">Nombre</label>
            <input type="text" name="name" id="name" value="{{$user->name}}" required
                   class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{$user->email}}" required
                   class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium mb-1">Contraseña</label>
            <input type="password" name="password" id="password" required
                   class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium mb-1">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" required
                   class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
        </div>

        <div>
            @if(Auth::user()->role === 'admin')
                <label for="role" class="block text-sm font-medium mb-1">Rol</label>
                <select name="role" required
                        class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            @endif
        </div>

        <button type="submit"
                class="w-full bg-gray-500 text-white px-4 py-2 rounded-lg mt-4 hover:bg-gray-600 transition">
            Actualizar Usuario
        </button>
    </form>

    <div class="mt-6 flex justify-center">
        @if(Auth::user()->role === 'admin')
            <form action="{{ route('users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-[var(--primary-color)] text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
                    Eliminar Usuario
                </button>
            </form>
        @else
        <form action="{{ route('delete-account') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-[var(--primary-color)] text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
                Eliminar Cuenta
            </button>
        </form>
        @endif
    </div>
</div>

@endsection


