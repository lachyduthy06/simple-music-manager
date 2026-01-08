<?php

namespace App\Policies;

use App\Models\Compilation;
use App\Models\User;

class CompilationPolicy
{
    public function view(User $user, Compilation $compilation): bool
    {
        return $compilation->user_id === $user->id;
    }

    public function update(User $user, Compilation $compilation): bool
    {
        return $compilation->user_id === $user->id;
    }

    public function delete(User $user, Compilation $compilation): bool
    {
        return $compilation->user_id === $user->id;
    }
}
