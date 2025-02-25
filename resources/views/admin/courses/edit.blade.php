@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar curso</h1>

@livewire('admin.courses.course-edit-form', ['courseId' => $course->id])

    <a href="{{route('courses.index')}} class
    text-blue-500 mt-4 inline-block">Cursos</a>
</div>
@endsection
