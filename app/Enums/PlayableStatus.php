<?php

namespace App\Enums;

enum PlayableStatus: string
{
    case PLAYABLE = 'playable';
    case WORKING_ON_IT = 'practicing';
    case NOT_PLAYABLE_YET = 'unplayable';

    public function label(): string
    {
        return match ($this) {
            self::PLAYABLE => __('Playable'),
            self::WORKING_ON_IT => __('Practicing'),
            self::NOT_PLAYABLE_YET => __('Unplayable'),
        };
    }

    // Use this in the status Select form component
    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $case) => [
                $case->value => $case->label(),
            ])
            ->toArray();
    }
}
