<x-app-layout>
    <div class="flex flex-col">
        <livewire:board :board="1" wire:key="1" @taskMovedList="$refresh" />
    </div>
</x-app-layout>
