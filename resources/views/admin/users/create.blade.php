@extends('layouts.nav')

@section('title', 'Crear Usuario')

@section('content')

<div class="max-w-2xl mx-auto bg-gray-800 border border-gray-700 rounded-lg shadow-lg p-6 text-white">
    <h1 class="text-3xl font-bold text-center font-mono mb-6">
        Crear Usuario
    </h1>

    <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nombre</label>
            <input type="text" name="name" id="name" required
                   class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input type="email" name="email" id="email" required
                   class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Contraseña</label>
            <input type="password" name="password" id="password" required
                   class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" required
                   class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
        </div>

        <div>
            <label for="role" class="block text-sm font-medium text-gray-300 mb-1">Rol</label>
            <select name="role" required
                    class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <button type="submit"
                class="w-full bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg mt-4 hover:bg-red-700 transition">
            Crear Usuario
        </button>
    </form>
</div>

@endsection
