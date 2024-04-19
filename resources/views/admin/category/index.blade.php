<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    @include('admin.components.header')
    @include('admin.components.sidebar')

    @yield('content')

</div>
@include('admin.js')
</body>
</html>
