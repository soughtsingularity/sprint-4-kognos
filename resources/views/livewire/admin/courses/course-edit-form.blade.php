<form wire:submit.prevent="update" class="bg-white p-6 rounded shadow-md">
    <label for="title">Título del Curso</label>
    <input type="text" wire:model="title" class="w-full p-2 border rounded">

    <label for="description" class="mt-2">Descripción</label>
    <textarea wire:model="description" class="border rounded p-2 w-full" cols="30" rows="10"></textarea>

    <h3 class="mt-4 font-bold">Capítulos</h3>

    @foreach($content as $chapterIndex => $chapter)
        <div class="border p-4 mt-2">
            <input type="text" wire:model="content.{{ $chapterIndex }}.title" class="border rounded p-2 w-full" placeholder="Título del capítulo">
            <button type="button" wire:click="removeChapter({{ $chapterIndex }})" class="bg-red-500 text-white px-2 py-1 rounded mt-2">Eliminar Capítulo</button>
            <button type="button" wire:click="addVideo({{ $chapterIndex }})" class="bg-green-500 text-white px-3 py-1 rounded mt-2">Añadir Video</button>

            <div class="ml-4 mt-2">
                <h4 class="text-lg font-semibold">Videos</h4>
                @foreach($chapter['videos'] as $videoIndex => $video)
                    <input type="text" wire:model="content.{{ $chapterIndex }}.videos.{{ $videoIndex }}.title" class="border rounded p-2 w-full mt-2" placeholder="Título del video">
                    <input type="url" wire:model="content.{{ $chapterIndex }}.videos.{{ $videoIndex }}.url" class="border rounded p-2 w-full mt-2" placeholder="URL del video">
                    <button type="button" wire:click="removeVideo({{ $chapterIndex }}, {{ $videoIndex }})" class="bg-red-500 text-white px-2 py-1 rounded mt-2">Eliminar Video</button>
                @endforeach
            </div>
        </div>
    @endforeach

    <button type="button" wire:click="addChapter" class="bg-green-500 text-white px-4 py-2 rounded mt-2">Agregar Capítulo</button>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Guardar Cambios</button>
</form>
