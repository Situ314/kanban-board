<?php

namespace Livewire;

use App\Livewire\Board;
use PHPUnit\Framework\TestCase;
use App\Models\KanbanList;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_board()
    {
        // Arrange
        $boardName = 'Test Board';

        // Act
        Livewire::test(Board::class)
            ->set('newBoardName', $boardName)
            ->call('createBoard');

        // Assert
        $this->assertTrue(Board::whereName($boardName)->exists());
    }

    /** @test */
    public function can_create_list()
    {
        // Arrange
        $board = Board::factory()->create();
        $listName = 'Test List';

        // Act
        Livewire::test(Board::class)
            ->set('selectBoard', $board->id)
            ->set('newListName', $listName)
            ->call('createList');

        // Assert
        $this->assertTrue(KanbanList::where('name', $listName)->where('board_id', $board->id)->exists());
    }
}
