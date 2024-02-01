<div x-data="{ showModalTask: false }" class="p-1 flex-1 bg-gray-700 border-gray-600 opacity-75 rounded-md mx-1.5">
    <div class="flex text-lg justify-between py-2 px-4 text-white uppercase border-white border-b-2">
        <span>
            {{ $list->name }}
        </span>
        <button @click="showModalTask = true" title="Add Task" class="inline-flex items-center justify-center w-8 h-8 mr-2 text-pink-100 transition-colors duration-150 bg-rose-700 rounded-full focus:shadow-outline hover:bg-pink-800">
            +
        </button>
    </div>
    <div class="p-2 h-full overflow-y-auto"
         @dragover.prevent
         @drop.prevent="@this.call('moveTask', draggedTaskId, {{ $list->id }}, draggedListFromId)">
        <div x-show="showModalTask" class="bg-white p-2 font-bold my-2 mb-4 rounded-md">
            <form wire:submit.prevent="createTask">
                <div class="text-lg text-indigo-700">
                    Add a new Task for {{ $list->name }}
                </div>
                <div class="mt-2">
                    <input type="text" wire:model.defer="newTaskTitle" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-sm leading-tight focus:outline-none focus:shadow-outline" placeholder="Task Name">
                </div>
                <div class="mt-2">
                    <textarea type="text" wire:model.defer="newTaskDescription" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 text-sm leading-tight focus:outline-none focus:shadow-outline" placeholder="Task Description"></textarea>
                </div>
                <div class="mt-4 items-end">
                    <button type="submit" @click="showModalTask = false" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                        Save
                    </button>
                    <button @click="showModalTask = false" class="bg-rose-800 hover:bg-rose-900 text-white font-bold py-2 px-4 rounded">
                        Close
                    </button>
                </div>
            </form>
        </div>
        @foreach ($list->tasks as $task)
            <livewire:task :task="$task" :key="$task->id" />
        @endforeach
    </div>
    <!-- Optionally, add a form or a button to add new tasks to the list -->
</div>
