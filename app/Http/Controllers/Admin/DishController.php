<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{

    private $validations = [
        'slug'      => [
            'required',
            'string',
            'max:100',
        ],
        'name'          => 'required|string|max:100',
        'price'         => 'required|integer',
        'image'         => 'required',
        'visibility'    => 'integer',
        'description'   => 'required|string',

    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $dishes = $user->dishes();
        $query = $request->query('search');


        if ($query) {
            $dishes = $dishes->where('name', 'like', '%' . $query . '%');
        }

        $dishes = $dishes->paginate(10);

        return view('admin.dishes.index', compact('dishes', 'user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validations);
        $user       = Auth::user();
        $data       = $request->all();
        $visibility = isset($data['visibility']) ? $data['visibility']  : 0;

        if (array_key_exists('image', $data)) {
            $image = Storage::put('dishes_images', $data['image']);
            $data['image'] = $image;
        }
        $dish = new Dish;

        $dish->name             = $data['name'];
        $dish->price            = $data['price'];
        $dish->image            = $data['image'];
        $dish->description      = $data['description'];
        $dish->visibility       = $visibility;
        $dish->slug             = $data['slug'];
        $dish->user_id          = $user->id;
        $dish->save();
        return redirect()->route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        $this->authorize('view', $dish);
        return view('admin.dishes.show', compact('dish'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $this->authorize('view', $dish);
        return view('admin.dishes.edit', ['dish' => $dish]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate($this->validations);
        $data = $request->all();
        $visibility = isset($data['visibility']) ? $data['visibility']  : 0;
        if (isset($data['image'])) {
            $img = Storage::put('uploades_images', $data['image']);
            Storage::delete($dish->image);
        } else {
            $img = $dish->image;
        }


        $dish->name = $data['name'];
        $dish->price = $data['price'];
        $dish->image = $img;
        $dish->description = $data['description'];
        $dish->visibility = $visibility;
        $dish->slug = $data['slug'];
        $dish->update();
        return redirect()->route('admin.dishes.show', ['dish' => $dish]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->orders()->detach();
        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }
}
