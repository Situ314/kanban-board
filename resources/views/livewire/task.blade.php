<div class="inline-block min-w-full bg-white p-2 font-bold my-2 mb-4 rounded-md"
     draggable="true"
     @dragstart="console.log(draggedTaskId);draggedTaskId = {{ $task->id }};draggedListFromId = {{ $task->list_id }}"
     @dragend="draggedTaskId = null;draggedListFromId = null;event.target.style.display='none';">
    <div class="text-lg border-b-2 border-indigo-700 text-indigo-700">
        {{ $task->title }}
    </div>
    <div class="text-sm mt-2">
        {{ $task->description }}
    </div>
</div>
