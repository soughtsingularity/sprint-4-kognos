<div class="bg-white p-6 rounded shadow-md">

    <h2 class="text-xl font-bold mb-4">{{ $course->title }}</h2>

    @if((Auth::check() && Auth::user()->role === 'user'))
    <div class="mb-4">
        <p class="text-gray-700">Progreso: <strong>{{ round($progress, 2) }}%</strong></p>
        <div class="w-full bg-gray-200 rounded-full h-4">
            <div class="bg-blue-500 h-4 rounded-full" style="width: {{ $progress }}%"></div>
        </div>
    </div>
    @endif

    @if($chapter)
        <div class="border p-4 mb-2 rounded">
            <h3 class="text-lg font-semibold">{{ $chapter['title'] }}</h3>

            @if(isset($chapter['videos']))
                @foreach($chapter['videos'] as $video)
                    <h4 class="text-md mt-2">{{ $video['title'] }}</h4>
                    <iframe class="w-full mt-2" height="315" src="{{ $video['url'] }}" frameborder="0" allowfullscreen></iframe>
                @endforeach
            @endif

            @if((Auth::check() && Auth::user()->role === 'user'))
            <div class="mt-4">
                <button type="button"
                        wire:click="markChapterComplete"
                        class="bg-green-500 text-white px-4 py-2 rounded">
                    Marcar capítulo como completado
                </button>
            </div>
            @endif
        </div>
    @else
        <p class="text-gray-700">No hay capítulos disponibles.</p>
    @endif

    <div class="mt-4 flex justify-between">
        @if($this->currentChapterIndex > 0)
            <button type="button"
                    wire:click="previousChapter"
                    class="bg-gray-500 text-white px-4 py-2 rounded">
                Capítulo Anterior
            </button>
        @endif

        @if($this->currentChapterIndex < count($chapters) - 1)
            <button type="button"
                    wire:click="nextChapter"
                    class="bg-blue-500 text-white px-4 py-2 rounded">
                Siguiente Capítulo
            </button>
        @elseif((Auth::check() && Auth::user()->role === 'user'))
            <button type="button"
                    wire:click="completeCourse"
                    class="bg-green-700 text-white px-4 py-2 rounded">
                Completar Curso
            </button>
        @endif
    </div>
</div>




