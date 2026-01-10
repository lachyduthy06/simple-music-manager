<div>
    <div class="flex items-start justify-between">
        {{-- Heading --}}
        <div>
            <flux:heading size="xl" level="1">{{ $collection->name }}</flux:heading>
            <flux:text class="mb-2 mt-2 text-base">
                {{ $collection->pieces_count }} {{ __(Str::plural('Piece', $collection->pieces_count)) }}
                |
                {{ $collection->pieces_count ? round(($collection->playable_count / $collection->pieces_count) * 100) : 0 }}% {{ __('playable') }}
                |
                {{ __($collection->instrument->name) }}
            </flux:text>
        </div>

        {{-- Edit Button --}}
        <livewire:components.buttons.edit-button :link="url('/admin/collections/' . $collection->id . '/edit')" />
    </div>

    {{-- Pieces List --}}
    <livewire:components.lists.pieces-list :pieces="$pieces" :showCollection="false" :showSince="false" />
</div>
