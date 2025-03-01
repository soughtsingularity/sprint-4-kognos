@extends('layouts.nav')

@section('title', $chapters[$chapterIndex]['title'] ?? 'Capítulo no disponible')

@section('content')

<div class="container mx-auto p-6 bg-gray-800 border border-gray-700 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-white mb-6 font-mono text-center">
        {{ $course->title }}
    </h1>

    @livewire('courses.course-progress', ['course' => $course])
</div>

@endsection
