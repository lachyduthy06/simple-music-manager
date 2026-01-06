<?php

namespace App\Policies;

use App\Models\Instrument;
use App\Models\User;

class InstrumentPolicy
{
    /**
     * Authorize all actions within this policy for admins.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }
        return null;
    }

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
