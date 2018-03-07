@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a> </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </div>
    </nav><!-- /.breadcrumb -->

    <section id="product-section" class="container">

        <div class="row">

            <div class="col-lg-6 prod-img">
                <img src="{{ asset('/images/products/'.$product->slug.'.jpg') }}">
            </div>

            <div class="col-lg-6">
                <h2>{{ $product->name }}</h2>
                <div class="subtitle">{{ $product->details }}</div>
                <div class="price">{{ $product->presentPrice() }}</div>
                <p>{{ $product->description }}</p>

                <div class="button-container">

                    <form action="{{ route('cart.store') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}" >
                        <input type="hidden" name="name" value="{{ $product->name }}" >
                        <input type="hidden" name="price" value="{{ $product->price }}" >
                        <button class="button" type="submit">Add to Cart</button>
                    </form>

                </div>
            </div>
        </div>

    </section><!-- /.products-section -->

    @include('partials.prod_myLike')


    @include('partials.about')

    @endsection