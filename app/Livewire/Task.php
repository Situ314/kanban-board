<?php

namespace App\Livewire;

use Livewire\Component;

class Task extends Component
{
    public $task;

    public function render()
    {
        return view('livewire.task');
    }
}
