<?php

namespace App\Http\Controllers\Api;

use App\Dish;
use App\Type;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $users = User::all();
        return response()->json([
            'success' => true,
            'results' => $users,
            'types' => $types,
        ]);

    }

    public function filter ($typeId)
    {
        $users = User::all();

        $userFiltered = Type::find($typeId)->users()->get();
        return response()->json([
            'success' => true,
            'results' => $userFiltered,
        ]);
    }
    public function show(Dish $dish)
    {
        $dish = Dish::where('id', $dish->id);
        return response()->json([
            'success' => true,
            'dish' => $dish,
        ]);
    }
    public function getDishesByUser($userId)
    {
        $dishes = Dish::where('user_id', $userId)->get();

        return response()->json($dishes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
