<ul role="list" class="divide-y divide-gray-200 dark:divide-white/10">
    @forelse($compilations as $compilation)
        <li class="py-2" :key="$compilation->id">
            <a href="{{ route('compilations.show', $compilation) }}"
               class="flex justify-between items-center hover:bg-gray-50 dark:hover:bg-zinc-700 py-2 rounded"
            >
                <div class="flex flex-col">
                    {{-- Compilation Name --}}
                    <span class="font-medium text-gray-900 dark:text-white">{{ $compilation->name }}</span>

                    {{-- Pieces Count --}}
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $compilation->pieces_count }} {{ Str::plural('Piece', $compilation->pieces_count) }}
                        </span>
                </div>

                <livewire:components.badges.playable-percentage-badge :percentage="$compilation->playablePercentage()" />
            </a>
        </li>
    @empty
        <li class="py-4 text-gray-500 dark:text-gray-400">No compilations found.</li>
    @endforelse
</ul>
