<div>
    <div class="flex items-start justify-between">
        {{-- Heading --}}
        <div>
            <flux:heading size="xl" level="1">{{ $compilation->name }}</flux:heading>
            <flux:text class="mb-2 mt-2 text-base">
                {{ $compilation->pieces_count }} {{ Str::plural('Piece', $compilation->pieces_count) }}
                |
                {{ $compilation->playablePercentage() }}% playable
            </flux:text>
        </div>

        {{-- Edit Button --}}
        <livewire:components.buttons.edit-button :link="url('/admin/compilations/' . $compilation->id . '/edit')" />
    </div>

    {{-- Pieces List --}}
    <livewire:components.lists.pieces-list :pieces="$pieces" :showCollection="false" :showSince="false" />
</div>
