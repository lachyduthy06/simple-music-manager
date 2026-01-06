<?php

namespace App\Policies;

use App\Models\Piece;
use App\Models\User;

class PiecePolicy
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

    public function view(User $user, Piece $piece): bool
    {
        return $piece->collection->user_id === $user->id;
    }

    public function update(User $user, Piece $piece): bool
    {
        return $piece->collection->user_id === $user->id;
    }

    public function delete(User $user, Piece $piece): bool
    {
        return $piece->collection->user_id === $user->id;
    }
}
