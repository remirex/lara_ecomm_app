@extends('layouts.app')

@section('title', 'cart')

@section('content')

    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
                <li class="breadcrumb-item active" aria-current="page">Shopping cart</li>
            </ol>
        </div>
    </nav><!-- /.breadcrumb -->

    <div class="container">

        <div class="col-sm-9 cart-section">

            @if(Session::has('session_message'))
                <div class="alert alert-success"><em> {!! session('session_message') !!}</em></div>
            @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if( Cart::count() > 0 )

                    <h5 style="margin-bottom: 30px">{{ Cart::count() }} item(s) in Shopping Cart</h5>

            <div class="table-responsive">

                <table class="table">

                    @foreach( Cart::content() as $item)
                    <tr>
                        <td><a href="{{ route('show', $item->model->slug) }}"><img src="{{ asset('images/products/'.$item->model->slug).'.jpg' }}" width="80" height="40"></a> </td>
                        <td><a href="{{ route('show', $item->model->slug) }}">{{ $item->model->name }}</a> </td>
                        <td class="text-right">
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="cart-button">Remove&nbsp;</button><i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                            </form>
                            <form action="{{ route('cart.saveForLater', $item->rowId) }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="cart-button">Save for Later&nbsp;</button><i class="fa fa-check-square" aria-hidden="true" style="color: green"></i>
                            </form>
                        </td>
                        <td class="text-right">
                            <select class="quantity" data-id="{{ $item->rowId }}">
                                @for($i = 1; $i < 5 + 1; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </td>
                        <td class="text-right">
                            {{ presentPrice($item->subtotal) }}
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div><!-- /.table -->

            <div class="cart-totals">

                <div class="row">
                    <div class="col-lg-6">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ducimus expedita incidunt maiores minus, obcaecati odio omnis quae reprehenderit tempore!
                    </div>

                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="text-right ml-auto">
                                <tr>
                                    <td>Subtotal</td>
                                    <td>{{ presentPrice(Cart::subtotal()) }}</td>
                                </tr>
                                <tr>
                                    <td>PDV (20%)</td>
                                    <td>{{ presentPrice(Cart::tax()) }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th>{{ presentPrice(Cart::total()) }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.cart-totals -->

            <div class="cart-buttons clearfix">

                <a href="{{ route('shop') }}" class="button">Continue Shopping</a>
                <a href="{{ route('checkout.index') }}" class="checkout-button float-right">Procceed to Checkout</a>
            </div><!-- /.cart-buttons -->

                @else

                <h5>No items in Cart</h5>

                    <div class="button-container" style="margin: 0">
                        <a href="{{ route('shop') }}" class="button continue">Continue Shopping</a>
                    </div>

                @endif

            <div>
                @if(Cart::instance('saveForLater')->count() > 0)

                    <h5 style="margin-bottom: 30px">{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h5>

                    <div class="table-responsive">

                        <table class="table">

                            @foreach( Cart::instance('saveForLater')->content() as $item)
                                <tr>
                                    <td><a href="{{ route('show', $item->model->slug) }}"><img src="{{ asset('images/products/'.$item->model->slug).'.jpg' }}" width="80" height="40"></a> </td>
                                    <td><a href="{{ route('show', $item->model->slug) }}">{{ $item->model->name }}</a> </td>
                                    <td class="text-right">
                                        <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="cart-button">Remove&nbsp;</button><i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                        </form>
                                        <form action="{{ route('saveForLater.moveToCart', $item->rowId) }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="cart-button">Move to Cart&nbsp;</button><i class="fa fa-check-square" aria-hidden="true" style="color: green"></i>
                                        </form>
                                    </td>
                                    <td class="text-right">
                                        <select>
                                            <option>1</option>
                                        </select>
                                    </td>
                                    <td class="text-right">
                                        {{ $item->model->presentPrice() }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div><!-- /.table save for later-->

                    @else

                    <p>You have no items Saved for Later</p>

                    @endif
            </div>

        </div><!-- /.cart-section -->

    </div>

    <script>
        $('.alert').delay(5000).slideUp(300);
    </script>

    @include('partials.prod_myLike')

    @include('partials.about')

    @endsection