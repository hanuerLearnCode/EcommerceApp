@extends('layouts.fe')
@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            </div>
        @endif
        <h2 class="header_section">Your Cart</h2>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $count = 0;
                $totalPrice = 0;
            @endphp
            @if($cart == null)
                <h3>
                    <a href='{{route('home.redirect')}}'>Try adding some products first!</a>
                </h3>
            @else
                @foreach($cart as $cartItem)
                    @php
                        $count++;
                        $totalPrice += $cartItem['product'][0]->price * $cartItem['quantity'];
                    @endphp
                    <tr>
                        <th scope="row">{{$count}}</th>
                        <td>{{$cartItem['product'][0]->title}}</td>
                        <td>{{$cartItem['product'][0]->description}}</td>
                        <td>
                            <span>
                                <a href="{{route('cart.decrease', $cartItem['product'][0]->id)}}">-</a>
                            </span>
                            {{$cartItem['quantity']}}
                            <span>
                                 <a href="{{route('cart.increase', $cartItem['product'][0]->id)}}">+</a>
                            </span>
                        </td>
                        <td>{{$cartItem['product'][0]->price}}</td>
                        <td>{{$cartItem['product'][0]->price * $cartItem['quantity']}}</td>
                        <td>
                            <a href="{{route('cart.delete', $cartItem['product'][0]->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <th scope="row" colspan="5">Total</th>
                <td>{{$totalPrice}}</td>
                <td>
                    <a href="">Checkout</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
