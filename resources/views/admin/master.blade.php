<!doctype html>
<html lang="{{ app()->getLocale() }}">
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

    <script src="{{asset('jquery/jquery-3.2.1.min.js')}}"></script>
</head>
<body class="admin_body">

<header class="admin_header">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg  fixed-top" id="mainNav">

        <a class="navbar-brand" href="">Regie Ecommerce.com</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span style="color: white"><i class="fa fa-lg fa-navicon"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>

    </nav><!-- /.navigation -->

</header><!-- /.header -->

<div class="container-fluid">

    <div class="row">

        <nav class="col-sm-3 col-md-2 d-none d-sm-block side_nav">
            <ul class="nav  flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer fa-lg" aria-hidden="true"></i> &nbsp;&nbsp;Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><i class="fa fa-list-alt fa-lg" aria-hidden="true"></i> &nbsp;&nbsp;Product&nbsp;&nbsp;</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.add') }}">Add Product</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><i class="fa fa-list-alt fa-lg" aria-hidden="true"></i> &nbsp;&nbsp;Category&nbsp;&nbsp;</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.add_cat') }}">Add Category</a>
                    </div>
                </li>
            </ul>

        </nav>

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

            <div class="row">

                @yield('content')

            </div>
        </main>
    </div><!-- /.row -->


</div><!-- /.container-fluid -->



<!-- load scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lightbox/js/lightbox.min.js')}}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>