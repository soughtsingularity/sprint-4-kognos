<form wire:submit.prevent="save" class="bg-gray-800 border border-gray-700 p-6 rounded-lg shadow-lg text-white">
    
    <label for="title" class="block text-sm font-medium mb-1">Título del Curso</label>
    <input type="text" wire:model="title" class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">

    <label for="description" class="block text-sm font-medium mt-4 mb-1">Descripción</label>
    <textarea wire:model="description" cols="30" rows="5" class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]"></textarea>

    <h3 class="mt-4 text-lg font-bold border-b border-gray-600 pb-2">Capítulos</h3>

    @foreach($content as $chapterIndex => $chapter)
        <div class="mt-4 p-4 bg-gray-700 border border-gray-600 rounded-lg">
            <input type="text" wire:model="content.{{$chapterIndex}}.title" placeholder="Título del capítulo" class="w-full p-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">

            <div class="flex space-x-2 mt-2">
                <button type="button" wire:click="removeChapter({{$chapterIndex}})" class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition">
                    Eliminar
                </button>
                <button type="button" wire:click="addVideo({{$chapterIndex}})" class="text-white bg-gray-700 px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    Añadir Video
                </button>
            </div>

            <div class="ml-4 mt-3 space-y-3">
                @foreach($chapter['videos'] as $videoIndex => $video)
                    <input type="text" wire:model="content.{{$chapterIndex}}.videos.{{$videoIndex}}.title" placeholder="Título del video" class="w-full p-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
                    <input type="url" wire:model="content.{{$chapterIndex}}.videos.{{$videoIndex}}.url" placeholder="URL del video" class="w-full p-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
                    
                    <button type="button" wire:click="removeVideo({{$chapterIndex}}, {{$videoIndex}})" class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition">
                        Eliminar Video
                    </button>
                @endforeach
            </div>
        </div>
    @endforeach

    <button type="button" wire:click="addChapter" class="w-full bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
        Agregar Capítulo
    </button>

    <button type="submit" class="w-full bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg mt-4 hover:bg-red-700 transition">
        Guardar Curso
    </button>

</form>

