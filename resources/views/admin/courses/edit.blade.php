@extends('layouts.nav')

@section('title', 'Editar Curso')

@section('content')

<div class="max-w-2xl mx-auto bg-gray-800 border-gray-700 rounded-lg shadow-lg p-6">
    <h1 class="text-3xl font-bold text-white mb-6 text-center font-mono">
        Editar curso
    </h1>

@livewire('admin.courses.course-edit-form', ['courseId' => $course->id])

</div>
@endsection
