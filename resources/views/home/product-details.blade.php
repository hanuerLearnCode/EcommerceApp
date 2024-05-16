<!DOCTYPE html>
<html lang="">
<head>
    <!-- Basic -->
    {{--    <base href="/public">--}}
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
    <title>{{config('app.name')}}</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}"/>
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet"/>
</head>
<body>
<div class="header-wrapper">
    <!-- header section strats -->
    @include('home.components.header')
    <!-- end header section -->
</div>

<div class="card m-auto p-2" style="width: 18rem; border: none">
    <img src="{{$product->image[count($product->image)-1]->path}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-text">Category: {{$category->name}}</p>
        <p class="card-text">Quantity: {{$product->quantity}}</p>
        <p class="card-text">Price: {{$product->price}}</p>
        <p class="card-text">Sale: {{$sale->percentage}}%</p>
        <div class="button-wrapper">
            <a href="{{route('buy')}}" class="btn btn-primary">Buy now</a>
            <form class="m-auto" action="{{route('addToCart', $product->id)}}"
                  method="Post">
                @csrf
                <div class="row m-auto">
                    <div class="col-md-4">
                        <input type="number" class="form-control" id="quantity" name="quantity"
                               value="1" min="1">
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-primary" value="Add to Cart">
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- footer start -->
@include('home.components.footer')
<!-- footer end -->

<div class="cpy_">
    <p class="mx-auto">© 2024 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
</div>
<!-- jQery -->
<script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
<!-- popper js -->
<script src="{{asset('home/js/popper.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('home/js/bootstrap.js')}}"></script>
<!-- custom js -->
<script src="{{asset('home/js/custom.js')}}"></script>
</body>
</html>
