@extends('layouts.nav')

@section('title', $chapters[$chapterIndex]['title'] ?? 'Capítulo no disponible')

@section('content')

<div class="container mx-aut p-4o">
    <h1 class="text-2xl font-bold mb-4">{{$course->title}}</h1>
    @livewire('courses.course-progress', ['course' => $course])
</div>


@endsection