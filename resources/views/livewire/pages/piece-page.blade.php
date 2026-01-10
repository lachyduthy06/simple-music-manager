<div>
    <div class="flex items-start justify-between">
        {{-- Heading + Status--}}
        <div>
            <flux:heading size="xl" level="1">
                {{ $piece->name }}
                <livewire:components.badges.playable-status-badge :status="$piece->status"/>
            </flux:heading>
            <flux:text class="mb-6 mt-2 text-base">
                {{ $piece->artist ?? 'Unknown Artist' }}
            </flux:text>
        </div>

        {{-- Edit Button --}}
        <livewire:components.buttons.edit-button
            :link="url('/admin/collections/' . $piece->collection->id . '/pieces/' . $piece->id . '/edit')"
        />
    </div>

    {{-- Content --}}
    <div class="space-y-4">

        {{-- Lyrics --}}
        @if($piece->lyrics_link)
            <flux:text class="font-medium">
                Lyrics:
                <flux:link href="{{ $piece->lyrics_link }}" external>
                    {{ $piece->lyrics_link }}
                </flux:link>
            </flux:text>
        @endif

        {{-- Tutorial --}}
        @if($piece->tutorial_link)
            <flux:text class="font-medium">
                Tutorial:
                <flux:link href="{{ $piece->tutorial_link }}" external>
                    {{ $piece->tutorial_link }}
                </flux:link>
            </flux:text>
        @endif

        {{-- Notes --}}
        @if($piece->notes)
            <flux:text class="font-medium">
                Notes:
                <flux:text inline variant="strong">
                    {{ $piece->notes }}
                </flux:text>
            </flux:text>
        @endif

        {{-- Collection --}}
        <flux:text class="font-medium">
            Collection:
            <flux:link href="{{ route('collections.show', $piece->collection) }}">
                {{ $piece->collection->name }}
            </flux:link>
            <flux:text inline="true" class="text-gray-900 dark:text-gray-100">
                ({{ $piece->collection->instrument->name }})
            </flux:text>
        </flux:text>
    </div>
</div>
