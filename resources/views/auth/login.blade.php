@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="w-full max-w-md bg-[var(--light-bg)] rounded-lg shadow-lg p-6">

    <h1 class="text-2xl font-bold text-[var(--text-light)] text-center mb-4 font-mono">
        Iniciar Sesión
    </h1>

    @if($errors->any())
        <div class="bg-red-600 text-white p-3 rounded-lg mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        
        <div>
            <label for="email" class="block text-sm font-medium text-[var(--text-light)] mb-1">
                Correo Electrónico
            </label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="w-full p-2.5 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-[var(--text-light)] mb-1">
                Contraseña
            </label>
            <input type="password" name="password" id="password" required
                class="w-full p-2.5 rounded-lg border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
        </div>

        <button type="submit"
            class="w-full bg-[var(--primary-color)] text-white font-bold rounded-lg py-2.5 text-center hover:bg-red-700 transition">
            Iniciar Sesión
        </button>

        <p class="text-sm text-gray-400 text-center">
            ¿No tienes una cuenta?
            <a href="{{ route('register') }}" class="text-[var(--primary-color)] hover:underline">
                Regístrate aquí
            </a>
        </p>
    </form>
</div>
@endsection
