@extends('layouts.app')

@section('title', 'Crear usuario')

@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Crear Usuario</h1>

    <form method="POST" action="{{route('admin.users.store')}}" class="bg-white p-6 rounded shadow-md">
        @csrf

        <label for="name" class="block">Nombre</label>
        <input type="text" name="name" id="name" required class="border rounded p-2 w-full mb-2"> 
    
        <label for="email" class="block">Email</label>
        <input type="email" name="email" id="email" required class="border rounded p-2 w-full mb-2">

        <label for="password" class="bloc">Contraseña</label>
        <input type="password" name="password" id="password" required class="border rounded p-2 w-full mb-2">

        <label for="password_confirmation" class="block">Confirmar Contraseña:</label>
        <input type="password" name="password_confirmation" required class="border rounded p-2 w-full mb-2">
    
        <label for="role" class="block">Rol:</label>
        <select name="role" required class="border rounded p-2 w-full mb-2">
            <option value="user">Usuario</option>
            <option value="admin">Administrador</option>
        </select>

        <button type="submit" class="bg-blue-500 text-white px4- py-2 rounded mt-4 w-full">Crear usuario</button>
    </form>
    
    <a href="{{route('admin.users.index')}}" class="text-blue-500 mt-4 inline-block">Usuarios</a>
</div>
@endsection