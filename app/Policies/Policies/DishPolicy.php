<?php

namespace App\Policies\Policies;

use App\Dish;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DishPolicy
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

    public function view(User $user, Dish $dish)
{
    return $user->id === $dish->user_id;
}
}
