<?php

namespace App\Http\Middleware;

use Closure;
use App\Dish;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $model
     * @return mixed
     */
    public function handle($request, Closure $next, $model)
    {
        $id = $request->route()->parameter($model);
        $dish = Dish::find($id);
        $order = Order::whereHas('dishes', function ($query) use ($id) {
            $query->where('dish_id', $id);
        })->first();
        $user = $order ? $order->user : null;

        if (!$dish || !$user || $user->id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'Unauthorized action.');
        }

        return $next($request);
    }
}

// togli la parte di user->isAdmin perchè ogni utente è amministratore delle sue cose inoltre la correlazione $user->orders() non esiste
