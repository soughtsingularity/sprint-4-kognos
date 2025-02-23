@extends('layouts.app')

@section('title', 'Editar usuario')

@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Usuario</h1>

    <form method="POST" action="{{route('admin.users.update', $user)}}" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PATCH')

        <label for="name" class="block">Nombre</label>
        <input type="text" name="name" id="name" value="{{$user->name}}" required class="border rounded p-2 w-full mb-2"> 
    
        <label for="email" class="block">Email</label>
        <input type="email" name="email" id="email" value="{{$user->email}}" required class="border rounded p-2 w-full mb-2">

        <label for="password" class="bloc">Contraseña</label>
        <input type="password" name="password" id="password" required class="border rounded p-2 w-full mb-2">

        <label for="password_confirmation" class="block">Confirmar Contraseña:</label>
        <input type="password" name="password_confirmation" required class="border rounded p-2 w-full mb-2">

        <label for="role" class="block">Rol:</label>
        <select name="role" required class="border rounded p-2 w-full mb-2">
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
        </select>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded mt-4 w-full">Actualizar Usuario</button>
    </form>

    <a href="{{ route('admin.users.index') }}" class="text-blue-500 mt-4 inline-block">Usuarios</a>
</div>
@endsection

