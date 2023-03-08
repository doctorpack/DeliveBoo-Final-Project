@extends('layouts.app')

@section('content')
    <div class="background_img">
        <img class="img_background" src="https://media.discordapp.net/attachments/1031881470786154557/1079778610757521480/deliveboo-upscaling.png" alt="">
        <div class="container_home">


            <div class="h-100" >

                <div class="d-flex justify-content-center align-items-center flex-column h-100">

                    <div class="container container_order">
                        <h1 class="">Lista ordini</h1>
                        <table class="table table-striped table_orders">
                            <tr class="table-success">
                                <th>Numero ordine</th>
                                <th>Data e ora</th>
                                <th></th>
                            </tr>
                            @foreach ($orders as $order)
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="white"> {{ $order->id }}</td>
                                        <td class="white"> {{ $order->created_at }}</td>
                                        <td class="white"> <a href="{{ route('admin.orders.show', ['order' => $order]) }}"
                                                class="btn btn-outline-info">Info</a></td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>

                </div>
                <div>
                    {{ $orders->links() }}
                </div>

            </div>

        </div>
    </div>

@endsection

