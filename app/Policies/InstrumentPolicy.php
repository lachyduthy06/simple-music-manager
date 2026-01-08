<?php

namespace App\Policies;

use App\Models\Instrument;
use App\Models\User;

class InstrumentPolicy
{
    public function view(User $user, Instrument $instrument): bool
    {
        return $instrument->user_id === $user->id;
    }

    public function update(User $user, Instrument $instrument): bool
    {
        return $instrument->user_id === $user->id;
    }

    public function delete(User $user, Instrument $instrument): bool
    {
        return $instrument->user_id === $user->id;
    }
}
