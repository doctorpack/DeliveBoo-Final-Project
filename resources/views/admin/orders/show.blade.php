@extends('layouts.app')
@section('content')
    <div>
        <div class="background_img">
            <img class="img_background"
                src="https://media.discordapp.net/attachments/1031881470786154557/1079778610757521480/deliveboo-upscaling.png"
                alt="">
            <div
                class="container  container_home d-flex justify-content-center align-items-center flex-column h-100 container_show_order">
                <div class="container_order">
                    <div class="content_show_orders">
                        <div>

                            <table class="table">
                                <tbody>
                                  <tr>
                                    <th scope="row" class="font-weight-bold">Numero ordine:</th>
                                    <td>{{ $order->id }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" class="font-weight-bold">Prezzo totale:</th>
                                    <td>{{ $total_cost / 100 }} €</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" class="font-weight-bold">Via:</th>
                                    <td>{{ $order->address }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" class="font-weight-bold">Nome:</th>
                                    <td>{{ $order->customer_name }}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row" class="font-weight-bold">Email:</th>
                                    <td>{{ $order->email }}</td>
                                  </tr>
                                </tbody>
                              </table>
                            <div><span class="grassetto">Piatti :</span>
                                <ol class="list-group list-group-numbered mt-3">
                                    @php
                                        $dishCount = [];
                                    @endphp
                                    @foreach ($dishes as $dish)
                                        @if (isset($dishCount[$dish->name]))
                                            @php
                                                $dishCount[$dish->name]++;
                                            @endphp
                                        @else
                                            @php
                                                $dishCount[$dish->name] = 1;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @foreach ($dishCount as $name => $count)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                {{ $name }}
                                            </div>
                                            <span class="badge bg-primary rounded-pill">
                                                {{ $count }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>


                        </div>

                        <div class="white">
                            <button id="delete" class="btn btn-outline-danger mt-3" onclick="showPopup(event)"
                                data-id="{{ $order->id }}">Elimina</button>
                            <div class="background">
                                <div class="popup">
                                    <h5 class="w-100 text-center mb-3">Sei sicuro di volerlo eliminare?</h5>
                                    <form action="{{ route('admin.orders.destroy', ['order' => $order]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Elimina</button>
                                    </form>
                                    <button class="btn btn-secondary" id="retry" onclick="hidePopup()">Annulla</button>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>


            </div>

        </div>

    </div>

@endsection
