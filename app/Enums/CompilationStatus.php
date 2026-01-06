<?php

namespace App\Enums;

enum CompilationStatus: string
{
    case PLAYABLE = 'playable';
    case WORKING_ON_IT = 'workingOnIt';
    case NOT_PLAYABLE_YET = 'notPlayableYet';

    public function label(): string
    {
        return match ($this) {
            self::PLAYABLE => 'Playable',
            self::WORKING_ON_IT => 'Working on it',
            self::NOT_PLAYABLE_YET => 'Not playable yet',
        };
    }
}
