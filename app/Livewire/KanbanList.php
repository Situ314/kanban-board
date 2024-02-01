<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class KanbanList extends Component
{
    use LivewireAlert;

    public $list;

    public function render()
    {
        return view('livewire.kanban-list');
    }

    public function moveTask($taskId, $toListId, $fromListId): void
    {
        $task = Task::find($taskId);
        if ($task && ($toListId != $fromListId)) {
            $task->list_id = $toListId;
            $task->save();

            $this->alert('success', "Task $task->title moved!");
        }
    }

    public $newTaskTitle;
    public $newTaskDescription;
    public function createTask(): void
    {
        $validation = Validator::make([
            'newTaskTitle' => $this->newTaskTitle,
            'newTaskDescription' => $this->newTaskDescription
        ],[
            'newTaskTitle' => 'required|min:5',
            'newTaskDescription' => 'required|min:5|max:255',
        ],[
            'newTaskTitle.required' => 'You have to give the Task a name!',
            'newTaskTitle.min' => 'Name has to be longer!',
            'newTaskDescription.required' => 'You have to give the Task a description!',
            'newTaskDescription.min' => 'Description has to be longer!',
            'newTaskDescription.max' => 'Description has to be shorter!',
        ]);

        if ($validation->fails()) {
            $this->alert('error', "Error! " . $validation->errors()->first());
            $validation->validate();
        }

        $newTask = \App\Models\Task::create([
            'title' => $this->newTaskTitle,
            'description' => $this->newTaskDescription,
            'list_id' => $this->list->id
        ]);

        $this->alert('success', "Task $newTask->title created!");
    }
}
