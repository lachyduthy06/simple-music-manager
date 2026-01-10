<flux:badge
    size="sm"
    color="{{ $percentage === 100
                            ? 'green'
                            : ($percentage > 50 ? 'yellow' : 'zinc') }}"
>
    {{ $percentage }}% Playable
</flux:badge>
