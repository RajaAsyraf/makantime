<?php

namespace App\Policies;

use App\User;
use App\Restaurant;
use Illuminate\Auth\Access\HandlesAuthorization;

class RestaurantPolicy
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
     * Determine if the given user can remove restaurant from group if:
     *  - User is creator of the restaurant
     *
     * @param App\User $user
     * @param App\Restaurant $restaurant
     * @return bool
     */
    public function removeFromGroup(User $user, Restaurant $restaurant)
    {
        return $user->id === $restaurant->created_by;
    }
}
