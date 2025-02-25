@extends('layouts.app')

@section('title', $chapters[$chapterIndex]['title'] ?? 'Capítulo no disponible')

@section('content')

<div class="bg-white p-6 rounded shadow-md">
    @if($userProgress < ($chapterIndex / $totalChapters) * 100)
        <p class='text-red-500 font-bold'>Este capítulo está bloqueado. Debes completar el anterior antes de continuar. </p>
    @else
        <h1 class="text-2xl font-bold mb-4">{{$chapters[$chapterIndex]['title']}}</h1>
        <p class="text-gray-600">{{$chapters[$chapterIndex]['content'] ?? 'Son contenido disponible'}}</p>
        @if(isset($chapters[$chapterIndex]['videos']))
            @foreach($chapters[$chapterIndex]['videos'] as $video)    
                <h3 class="text-lg font-semibold mt-4">{{ $video['title'] }}</h3>
                <iframe class="w-full mt-2" height="315" src="{{ $video['url'] }}" frameborder="0" allowfullscreen></iframe>
            @endforeach
        @endif

        <form method="POST" action="{{ROUTE('admin.courses.chapter.complete', [$course, $chapterIndex])}}" class="mt-4">
            @csrf
            <input type="chebox" id="completed" name="completed" required>
            <label for="completed" class="bg-green-500 text-white px-4 py-2">Marcar como completado</label>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded ml-4">Completar</button>
        </form>

        <div class="mt-6 flex justofy-between">
            @if($chapterIndex > 0)
                <a href="{{route('admin.courses.chapter', [$course, $chapterIndex - 1])}}" class="bg-gray-500 text-white px-4 py-2 rounded">Capítulo anterior</a>
            @endif
            @if($chapterIndex < $totalChapters - 1)
                <a href="{{route('admin.courses.chapter', [$course, $chapterIndex + 1])}}" class="bg-blue-500 text-white px-4 py-2 rounded ml-auto">Siguiente capítulo</a>
            @endif
        </div>
    @endif
</div>
@endsection