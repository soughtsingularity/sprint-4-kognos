@extends('layouts.nav')

@section('title', 'Crear curso')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Crear nuevo curso</h1>

    @livewire('admin.courses.course-create-form')
</div>
@endsection