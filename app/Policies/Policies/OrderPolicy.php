<?php

namespace App\Policies\Policies;

use App\User;
use App\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
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

    public function view(User $user, Order $order)
{
    $dishes = $order->dishes;
    foreach ($dishes as $dish) {
        if ($dish->user_id != $user->id) {
            return false;
        }
    }

    return true;
}
}
