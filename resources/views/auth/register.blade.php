@extends('layouts.app')

@section('title', 'Registra tu cuenta')

@section('content')
    <div class="w-full max-w-md mg-[var(--light-bg)] rounded-lg shadow-lg p-6">  
        <h1 class="text-2xl font-bold text-[var(--text-light)] text-center mb-4 font-mono">
            Registra tu cuenta
        </h1>

        <form method="POST" action="{{route('register')}}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-[var(--text-light)] mb-1">
                    Nombre
                </label>
                <input type="text" name="name" id="name" required
                       class="w-full p-2.5 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electrónico</label>
                <input type="email" name="email" id="email" required
                       class="w-full p-2.5 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                <input type="password" name="password" id="password" required
                       class="w-full p-2.5 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
            </div>
            <div>
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full p-2.5 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
            </div>

            <button type="submit"
                    class="w-full bg-[var(--primary-color)] text-white font-bold rounded-lg py-2.5 text-center hover:bg-red-700 transition">
                Registrarse
            </button>
            <p class="text-sm text-gray-400 text-center">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="text-[var(--primary-color)] hover:underline text-center">
                    Login
                </a>
            </p>
        </form>
    </div>
@endsection