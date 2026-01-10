<div>
    <div class="flex items-start justify-between">
        {{-- Heading --}}
        <div>
            <flux:heading size="xl" level="1">{{ __('Compilations') }}</flux:heading>
            <flux:text class="mb-2 mt-2 text-base">
                {{ $compilations->count() }} {{ __(Str::plural('Compilation', $compilations->count())) }}
            </flux:text>
        </div>

        {{-- Edit Button --}}
        <livewire:components.buttons.edit-button :link="route('filament.admin.resources.compilations.index')" />
    </div>

    {{-- Compilations List --}}
    <livewire:components.lists.compilations-list :compilations="$compilations" />
</div>
