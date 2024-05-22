@extends('layouts.fe')

@section('content')
    <div class="container">
        <h2 class="header_section">Your completed Order</h2>
        <div class="table-container">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Order No.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $count = 0;
                @endphp
                @foreach($orders as $order)
                    @php
                        $count++;
                    @endphp
                    @foreach($order->items as $item)
                        <tr>
                            <th scope="row">{{$count}}</th>
                            <td>{{$item->product->title}}</td>
                            <td>{{$item->product_quantity}}</td>
                            <td>{{$order->total_price}}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
