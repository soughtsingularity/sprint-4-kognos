<div class="bg-gray-800 border border-gray-700 p-6 rounded-lg shadow-lg text-white">

    @if(Auth::check() && Auth::user()->role === 'user')
    <div class="mb-4">
        <p class="text-gray-300">Progreso: <strong>{{ round($progress, 2) }}%</strong></p>
        <div class="w-full bg-gray-600 rounded-full h-4">
            <div class="bg-[var(--primary-color)] h-4 rounded-full transition-all" style="width: {{ $progress }}%"></div>
        </div>
    </div>
    @endif

    @if($chapter)
        <div class="border border-gray-600 p-4 mb-2 rounded-lg bg-gray-700">
            <h3 class="text-xl font-semibold text-[var(--primary-color)]">{{ $chapter['title'] }}</h3>

            @if(isset($chapter['videos']))
                @foreach($chapter['videos'] as $video)
                    <h4 class="text-md mt-2 text-gray-300">{{ $video['title'] }}</h4>
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe class="w-full rounded-lg mt-2" height="315" src="{{ $video['url'] }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                @endforeach
            @endif

            @if(Auth::check() && Auth::user()->role === 'user' && !$this->lastChapter && !isset($completedChapters[$currentChapterIndex]))
            <div class="mt-4">
                <button type="button"
                        wire:click="markChapterComplete"
                        class="text-white bg-red-600 px-4 py-2 rounded-lg hover:bg-red-700 transition">
                    Marcar capítulo como completado
                </button>
            </div>
            @endif
        </div>
    @else
        <p class="text-gray-300">No hay capítulos disponibles.</p>
    @endif
    <div class="mt-4 flex justify-between">
        @if($this->currentChapterIndex > 0)
            <button type="button"
                    wire:click="previousChapter"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition">
                Capítulo Anterior
            </button>
        @endif

        @if($this->currentChapterIndex < count($chapters) - 1)
            <button type="button"
                    wire:click="nextChapter"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition">
                Siguiente Capítulo
            </button>
        @elseif(Auth::check() && Auth::user()->role === 'user' && $this->lastChapter)
            <button type="button"
                    wire:click="completeCourse"
                    class="text-white bg-[var(--primary-color)] px-4 py-2 rounded-lg hover:bg-red-700 transition">
                Completar Curso
            </button>
        @endif
    </div>
</div>





