<!doctype html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',config('app.name'))</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.partials.head')
    @yield('head')
</head>
<body >
<div class="container px-auto " style="flex:1; overflow: hidden">

    @include('layouts.partials.navbar')
    @yield('content')

</div>
@include('layouts.partials.footer')




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>


@yield('footer')


</body>
</html>
