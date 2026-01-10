<flux:badge size="sm"
            color="{{ match($status) {
                    \App\Enums\PlayableStatus::PLAYABLE => 'green',
                    \App\Enums\PlayableStatus::WORKING_ON_IT => 'yellow',
                    \App\Enums\PlayableStatus::NOT_PLAYABLE_YET => 'zinc',
                } }}"
>
    {{ $status->label() }}
</flux:badge>
