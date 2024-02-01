<?php

namespace Livewire;

use App\Livewire\KanbanList;
use PHPUnit\Framework\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class KanbanListTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function can_move_task_to_another_list()
    {
        // Arrange
        $listFrom = KanbanList::factory()->create();
        $listTo = KanbanList::factory()->create();
        $task = Task::factory()->create(['list_id' => $listFrom->id]);

        // Act
        Livewire::test('kanban-list', ['list' => $listFrom])
            ->call('moveTask', $task->id, $listTo->id, $listFrom->id);

        // Assert
        $task->refresh();
        $this->assertEquals($listTo->id, $task->list_id);
    }

    /** @test */
    public function can_create_task()
    {
        // Arrange
        $list = KanbanList::factory()->create();
        $taskTitle = 'New Task';
        $taskDescription = 'New Task Description';

        // Act
        Livewire::test('kanban-list', ['list' => $list])
            ->set('newTaskTitle', $taskTitle)
            ->set('newTaskDescription', $taskDescription)
            ->call('createTask');

        // Assert
        $this->assertTrue(Task::where('title', $taskTitle)->where('description', $taskDescription)->where('list_id', $list->id)->exists());
    }

}
