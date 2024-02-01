<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Board extends Component
{
    use LivewireAlert;

    public $selectBoard;
    public $lists;
    public function mount()
    {
        $this->selectBoard = \App\Models\Board::first()->id ?? null;
    }

    public function render()
    {
        $this->loadLists();

        return view('livewire.board')
            ->withBoards(\App\Models\Board::get());
    }

    private function loadLists(): void
    {
        if ($this->selectBoard) {
            $this->lists = \App\Models\KanbanList::where('board_id', $this->selectBoard)->get();
        } else {
            $this->lists = [];
        }
    }

    public function updatedSelectBoard($value): void
    {
        $this->loadLists();
        $this->dispatch('$refresh');
    }

    public $newBoardName;

    public function createBoard(): void
    {
        $validation = Validator::make([
            'newBoardName' => $this->newBoardName
        ],[
            'newBoardName' => 'required|min:3|unique:boards,name',
        ],[
            'newBoardName.required' => 'You have to give the Board a name!',
            'newBoardName.min' => 'Name has to be longer!',
            'newBoardName.unique' => 'There\'s already other Board with that name!'
        ]);

        if ($validation->fails()) {
            $this->alert('error', "Error! " . $validation->errors()->first());
            $validation->validate();
        }

        $newBoard = \App\Models\Board::create(['name' => $this->newBoardName]);

        $this->selectBoard = $newBoard->id;

        $this->alert('success', "Board $newBoard->name created!");
    }

    public $newListName;

    public function createList(): void
    {
        $validation = Validator::make([
                'newListName' => $this->newListName
                ],[
                'newListName' => 'required|min:3',
                ],[
                'newListName.required' => 'You have to give the List a name!',
                'newListName.min' => 'Name has to be longer!'
                ]);

        if ($validation->fails()) {
            $this->alert('error', "Error! " . $validation->errors()->first());
            $validation->validate();
        }

        $newList = \App\Models\KanbanList::create([
            'name' => $this->newListName,
            'board_id' => $this->selectBoard
        ]);

        $this->alert('success', "New List $newList->name created!");
        $this->loadLists();
    }

}
