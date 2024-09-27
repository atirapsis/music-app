<?php

namespace App\Policies;

use App\Models\Music;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MusicPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function edit(User $user, Music $music)
    {
        return $user->id == $music->user_id
        ? Response::allow()
        : Response :: deny ('You do not own this post.');
    }

    public function update(User $user, Music $music)
    {
        return $user->id == $music->user_id;
    }
    public function destroy(User $user, Music $music)
    {
        return $user->id === $music->user_id
        ? Response::allow()
        : Reponse::deny('You are not authorized to delete this music infos.');
    }
}
