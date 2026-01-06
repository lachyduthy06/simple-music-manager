<?php

namespace App\Policies;

use App\Models\Collection;
use App\Models\User;

class CollectionPolicy
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

    public function view(User $user, Collection $collection): bool
    {
        return $collection->user_id === $user->id;
    }

    public function update(User $user, Collection $collection): bool
    {
        return $collection->user_id === $user->id;
    }

    public function delete(User $user, Collection $collection): bool
    {
        return $collection->user_id === $user->id;
    }
}
