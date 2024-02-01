<div x-data="{ draggedTaskId: null, showModalBoard: false, showModalList: false }">

    <header class="bg-gray-800 shadow w-full mb-6">
        <!-- Button to trigger modal -->

        <div class="flex max-w-10xl py-6 px-4 sm:pr-6 lg:pr-8">
            <select class="bg-gray-700 border border-gray-600 text-gray-900 text-lg
                text-white rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block mx-2 w-8/12 p-2.5 placeholder-gray-400"
                    wire:model.live="selectBoard">
                @foreach ($boards as $b)
                    <option value="{{ $b->id }}" wire:key="{{ $b->id }}">{{ $b->name }}</option>
                @endforeach
            </select>

            <button @click="showModalBoard = true" class="bg-indigo-500 mr-2 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded w-2/12">
                Add Board
            </button>

            <button @click="showModalList = true" class="bg-gray-200 border-2 text-indigo-500 border-indigo-500 hover:bg-gray-50 text-white font-bold py-2 px-4 rounded w-4/12">
                Add a New List to {{ \App\Models\Board::find($selectBoard)->name }}
            </button>
        </div>
    </header>

    <div class="flex columns-4 h-screen">
        @if(count($lists) > 0)
            @foreach ($lists as $list)
                <livewire:kanban-list :list="$list" :key="$list->id"/>
            @endforeach
        @else
            <div class="inline-block min-w-full border-2 border-rose-700 text-white h-min bg-rose-300 p-2 font-bold my-2 m-4 rounded-md bg-opacity-40">
                Board {{ \App\Models\Board::find($selectBoard)->name }} doesn't have any List, you can add it by clicking on "Add a new List {{ \App\Models\Board::find($selectBoard)->name }}"
            </div>
        @endif
    </div>

    <!-- Modal Board-->
    <div x-show="showModalBoard" class="fixed z-50 inset-0 overflow-y-auto bg-black bg-opacity-40">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-indigo-500 p-5 pt-1 rounded-lg shadow-lg w-1/2 border-4 border-white">
                <!-- Close button -->
                <div class="pt-4 flex justify-between text-white align-middle border-b-2 border-white">
                    <p class="align-middle text-xl">Add New Board</p>
                </div>
                <!-- Content -->
                <div class="mt-6">
                    <form wire:submit.prevent="createBoard">
                        <div class="mt-2">
                            <input type="text" wire:model.defer="newBoardName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Board Name">
                        </div>
                        <div class="mt-4 items-end">
                            <button type="submit" @click="showModalBoard = false" class="bg-white hover:bg-gray-100 text-indigo-400 font-bold py-2 px-4 rounded">
                                Save
                            </button>
                            <button @click="showModalBoard = false" class="bg-rose-800 hover:bg-rose-900 text-white font-bold py-2 px-4 rounded">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal List-->
    <div x-show="showModalList" class="fixed z-50 inset-0 overflow-y-auto bg-black bg-opacity-40">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-5 pt-1 rounded-lg shadow-lg w-1/2 border-4 border-indigo-500">
                <!-- Close button -->
                <div class="pt-4 flex justify-between text-indigo-600 align-middle border-b-2 border-indigo-600">
                    <p class="align-middle text-xl">Add New List to {{ \App\Models\Board::find($selectBoard)->name }}</p>
                </div>
                <!-- Content -->
                <div class="mt-6">
                    <form wire:submit.prevent="createList">
                        <div class="mt-2">
                            <input type="text" wire:model.defer="newListName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="List Name">
                        </div>
                        <div class="mt-4 items-end">
                            <button type="submit" @click="showModalList = false" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Save
                            </button>
                            <button @click="showModalList = false" class="bg-rose-800 hover:bg-rose-900 text-white font-bold py-2 px-4 rounded">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
