<?php

namespace App\Observers;

use App\Models\Team;
use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        $user->teams()->attach(
            $team = Team::create(['name' => $user->name])
        );
    }

    public function deleting(User $user)
    {
        $user->teams()->detach();
    }
}
