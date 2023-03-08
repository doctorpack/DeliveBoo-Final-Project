@extends('layouts.app')
@section('content')

<div class="container w-100">
    <div class="d-flex justify-content-center">
        <img class="img-fluid w-25 rounded " src="{{$user->image_logo}}" alt="">
    </div>
    <div class="d-flex justify-content-center">
        <img class="img-fluid w-25 rounded " src="{{ asset("storage/$user->image_logo") }}" alt="">
    </div>

    <div class="d-flex  justify-content-center">
        <h1 class="p-3 fw-bold ">I nostri piatti</h1>
    </div>
    @if(count($dishes) > 0)
<div>
    <table class="table caption-top table-striped table-bordered justify-content-center w-100" >
        <thead>
          <tr class="table-success">
            <th>Nome Piatto</th>
            <th>Prezzo</th>
            <th class="d-none d-sm-block">immagine</th>
            <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish)
          <tr>
            <td>{{$dish->name}}</td>
            <td>{{$dish->price/100}} €</td>
            <td class="w-100 p-3 d-none d-sm-block">
                <img class="img-fluid" src="{{$dish->image}}" alt="">
                <img class="img-fluid" src="{{ asset("storage/$dish->image") }}" alt="">
            </td>
            <th scope="row">
                <div class=" d-flex align-items-center bottoni">
                    <a href="{{ route('admin.dishes.show', ['dish' => $dish]) }}" class="btn btn-outline-info m-1  ">Info</a>
                    <a href="{{ route('admin.dishes.edit', ['dish' => $dish]) }}" class="btn btn-outline-success m-1  ">Modifica</a>
                    <button id="delete" class="btn btn-outline-danger" onclick="showPopup(event)" data-id="{{$dish->id}}">Elimina</button>
                        <div class="background">
                            <div class="popup">
                                <h5 class="w-100 text-center mb-3">Sei sicuro di volerlo eliminare?</h5>
                                <form action="{{ route('admin.dishes.destroy', ['dish' => $dish]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Elimina</button>
                                </form>
                                <button class="btn btn-secondary" id="retry" onclick="hidePopup(event)">Annulla</button>
                            </div>
                        </div>
                </div>
            </th>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@else
    <p>No dishes found.</p>
@endif

    <h2>categorie:</h2>
    <ul>
        @foreach (($user->types) as $type)
            <li>{{$type->name}}</li>
        @endforeach
    </ul>
</div>
<div>
    {{ $dishes->links() }}
</div>

@endsection
