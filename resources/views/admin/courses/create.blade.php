@extends('layouts.nav')

@section('title', 'Crear Curso')

@section('content')

<div class="max-w-2xl mx-auto bg-gray-800 border border-gray-700 rounded-lg shadow-lg p-6">
    <h1 class="text-3xl font-bold text-white mb-6 text-center font-mono">
        Crear Nuevo Curso
    </h1>

    @livewire('admin.courses.course-create-form')
</div>

@endsection
