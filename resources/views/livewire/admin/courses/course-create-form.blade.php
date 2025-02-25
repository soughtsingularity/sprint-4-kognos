<form wire:submit.prevent="save" class="bg-white p-6 rounded shadow-md">
    <label for="'title">Titulo del curso</label>
    <input type="text" wire:model="title" class="bourder rounded p-2 w-full">

    <label for="description" class="mt-2">Descripción</label>
    <textarea wire:model="description" cols="30" rows="10" class="border rounded p-2 w-full"></textarea>

    <h3 class="border p-2 mt-2">Capítulos</h3>

    @foreach($content as $chapterIndex =>$chapter)
        <div class="border p-2 mt-2">
            <input type="text" wire:model="content.{{$chapterIndex}}.title" placeholder="Titulo del capítulo" class="border rounded p-2 w-full">
            <button type="button" wire:click="removeChapter({{$chapterIndex}})" class="bg-red-500 text-white px-2 py-1 rounded mt-2">Eliminar</button>
            <button type="button" wire:click="addVideo({{$chapterIndex}})" class="bg-green-500 text-white px-3 py-1 rounded mt-2">Añadir video</button>
            
            <div class="ml-4">
                @foreach($chapter['videos'] as $videoIndex => $video)
                    <input type="text" wire:model="content.{{$chapterIndex}}.videos.{{$videoIndex}}.title" placeholder="Titulo del video" class="border rounded p-2 w-full mt-2">
                    <input type="url" wire:model="content.{{$chapterIndex}}.videos.{{$videoIndex}}.url" placeholder="Url del video" class="border rounded p-2 w-full mt-2">
                    <button type="button" wire:click="removeVideo{{$chapterIndex}}, {{$videoIndex}}" class="bg-red-500 text-white px-2 py-1 rounded mt-2">Eliminar video</button>
                @endforeach
            </div>
        </div>
    @endforeach

    <button type="button" wire:click="addChapter" class="bg-green-500 text-white px-4 py-2 rounded mt-2">Agregar Capítulo</button>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Guardar Cambios</button>
</form>
