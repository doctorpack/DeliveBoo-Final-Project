@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center container">
    <div class="card w-50">
        <div class="card-body">
          <h5 class="card-title">{{$dish->name}}</h5>
          <img class="card-img-top" src="{{$dish->image}}" alt="">
          <img class="card-img-top" src="{{ asset("storage/$dish->image") }}" alt="">
          <p class="card-text">{{$dish->description}}</p>
          <p class="card-text">Prezzo: {{$dish->price/100}} €</p>
          <a href="{{route('admin.dishes.index')}}" class="btn btn-primary">Torna ai piatti</a>
        </div>
      </div>
</div>

@endsection
