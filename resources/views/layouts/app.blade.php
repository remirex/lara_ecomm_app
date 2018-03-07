<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="description" content="Free Regie Ecommerce template">
    <meta name="keywords" content="PHP,JavaScript,Laravel,Angular,Nodejs,Vuejs">
    <meta name="author" content="Mirko Josimovic">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Regie Ecommerce | @yield('title','')</title>

    <!-- load fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}" type="text/css">

    <!-- load styles -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}" type="text/css">
    <link href="{{asset('lightbox/css/lightbox.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">

    <!-- load jquery -->
    <script src="{{asset('jquery/jquery-3.2.1.min.js')}}"></script>
</head>
<body>

<header>

    @include('partials.nav')

    @yield('baner')

</header>

@yield('content')

<footer>

    @include('partials.footer')

</footer>



<!-- load scripts -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lightbox/js/lightbox.min.js')}}"></script>

<script src="https://js.stripe.com/v3/"></script>

<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>