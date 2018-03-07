<a name="top"></a>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Regie Ecommerce.com</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span style="color: white"><i class="fa fa-lg fa-navicon"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop') }}">shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">cart
                        <span class="cart-count">{{ Cart::instance('default')->count() }}</span>
                    </a>
                </li>
                @if (Route::has('login'))
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ \Illuminate\Support\Facades\Auth::user()->name }}&nbsp;</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true"></i></a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-sign-out"></i></a>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account&nbsp;</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Regist</a>
                        </div>
                    </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav><!-- /.navigation -->