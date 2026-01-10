<div>
    {{-- Heading --}}
    <flux:heading size="xl" level="1">{{ $greeting }}, {{ $userName }}</flux:heading>
    <flux:text class="mb-6 mt-2 text-base">{{ $message }}</flux:text>

    {{-- Pieces List --}}
    <flux:text class="mt-2 text-gray-600 dark:text-gray-400">
        Recently added pieces
    </flux:text>
    <livewire:components.lists.pieces-list :pieces="$recentPieces" :showCollection="false" :showSince="false" />
</div>
