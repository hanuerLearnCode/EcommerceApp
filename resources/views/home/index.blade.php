<!DOCTYPE html>
<html lang="">
<head>
    <!-- Basic -->
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
<div class="hero_area">
    <!-- header section strats -->
    @include('home.components.header')
    <!-- end header section -->
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        </div>
    @endif
    <!-- slider section -->
    @include('home.components.slider')
    <!-- end slider section -->
</div>

<!-- why section -->
@include('home.components.why')
<!-- end why section -->

<!-- arrival section -->
@include('home.components.arrival')
<!-- end arrival section -->

<!-- product section -->
@include('home.components.product')
<!-- end product section -->

<!-- subscribe section -->
@include('home.components.subscribe')
<!-- end subscribe section -->

<!-- client section -->
@include('home.components.client')
<!-- end client section -->

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
