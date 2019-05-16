<?php

namespace App\Policies;

use App\User;
use App\Group;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can leave from group if:
     *  - User is member of the group
     *  - User is not admin of the group
     *
     * @param App\User $user
     * @param App\Group $group
     * @return bool
     */
    public function leave(User $user, Group $group)
    {
        $isGroupMember = $group->users()->where('user_id', $user->id)->exists();
        $isGroupAdmin = $group->admins()->where('user_id', $user->id)->exists();
        return $isGroupMember && !$isGroupAdmin;
    }
}
