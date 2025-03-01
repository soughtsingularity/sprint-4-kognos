<form wire:submit.prevent="update" class="bg-gray-800 border border-gray-700 p-6 rounded-lg shadow-lg text-white">

    <label for="title" class="block text-sm font-medium mb-1">Título del Curso</label>
    <input type="text" wire:model="title" class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring:-[var(--primary-color)] focus:border-[var(iprimary-color)]">

    <label for="description" class="block text-sm font-medium mt-4 mb-1">Descripción</label>
    <textarea wire:model="description" class="w-full p-2 rounded-lg bg-gray-700 border border-gray-600 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]" cols="30" rows="10"></textarea>

    <h3 class="mt-6 text-lg font-bold border-b border-gray-600 pb-2">Capítulos</h3>

    @foreach($content as $chapterIndex => $chapter)
        <div class="mt-4 p-4 bg-gray-700 border border-gray-600 rounded-lg">
            <input type="text" wire:model="content.{{ $chapterIndex }}.title" placeholder="Título del capítulo" class="w-full p-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]">
            
            <div class="flex space-x-2 mt-2">
                <button type="button" wire:click="removeChapter({{ $chapterIndex }})" class="bg-[var(--primary-color)] text-white px-3 py-1 rounded-lg hover:bg-red-700 transition">Eliminar Capítulo</button>
                <button type="button" wire:click="addVideo({{ $chapterIndex }})" class="bg-gray-500 text-white px-3 py-1 rounded-lg hover:bg-green-600 transition">Añadir Video</button>    
            </div>
            
            <div class="ml-4 mt-3 space-y-3">
                <h4 class="text-md font-semibold text-gray-300">Videos</h4>
                @foreach($chapter['videos'] as $videoIndex => $video)
                    <input type="text" wire:model="content.{{ $chapterIndex }}.videos.{{ $videoIndex }}.title" class="w-full p-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]" placeholder="Título del video">
                    <input type="url" wire:model="content.{{ $chapterIndex }}.videos.{{ $videoIndex }}.url" class="w-full p-2 rounded-lg bg-gray-800 border border-gray-700 text-white focus:ring-[var(--primary-color)] focus:border-[var(--primary-color)]" placeholder="URL del video">
                    <button type="button" wire:click="removeVideo({{ $chapterIndex }}, {{ $videoIndex }})" class="bg-[var(--primary-color)] text-white px-3 py-1 rounded-lg hover:bg-red-700 transition">Eliminar Video</button>
                @endforeach
            </div>
        </div>
    @endforeach

    <button type="button" wire:click="addChapter" class="w-full bg-gray-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-gray-700 transition">Agregar Capítulo</button>
    <button type="submit" class="w-full bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg mt-4 hover:bg-red-700 transition">Guardar Cambios</button>
</form>
