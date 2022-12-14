<?php

namespace App\Policies;

use App\Models\Launcher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LauncherPolicy
{
    use HandlesAuthorization;

    
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function before(User $user, $ability)
    {
        return true;
        // return $user->level === User::$ADMIN_LEVEL;
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Launcher $launcher) {
        return true;
        // return $launcher->user_id == $user->id;
    }

    //todo : complete section
}
