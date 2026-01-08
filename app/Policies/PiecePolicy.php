<?php

namespace App\Policies;

use App\Models\Piece;
use App\Models\User;

class PiecePolicy
{
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
